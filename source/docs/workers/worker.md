---
title: Run builds using a worker
description: Run builds using a worker
extends: _layouts.documentation
section: content
---

Run builds using a worker
=========================

The PHP Censor Worker runs in the background on your server and waits for new builds to be added to a Beanstalkd queue.
Unless already running a build, the worker will pick up and start running new builds almost immediately after their
creation.

The worker is the recommended way to run PHP Censor builds. You can run several workers all watching one queue,
allowing jobs to be run simultaneously without the overhead of polling your database.

Pre-Requisites
--------------

* You need to install [Beanstalkd](http://kr.github.io/beanstalkd/) - On Ubuntu, this is as simple as running
`apt-get install beanstalkd`.

* Systemd or [Supervisord](http://supervisord.org/) needs to be installed and running on your server.

Setting up the PHP Censor worker
--------------------------------

### On a new installation

Setting up the worker on a new installation of PHP Censor is as simple as entering the appropriate values for your 
Beanstalkd server hostname and queue name when running the PHP Censor installer. By default, the installer assumes that 
you'll be using beanstalkd on `localhost:11300` and will use the queue name `php-censor-queue`.

### On an existing installation

On an existing installation, to set up the worker, you simply need to add the beanstalkd host and queue names directly 
into your `config.yml` file like:

```yml
php-censor:
  queue:
    host:      localhost
    port:      11300
    name:      php-censor-queue
    lifetime:  600
```

Running the PHP Censor worker
-----------------------------

### By Systemd

You can use systemd to run the worker. Configuration for the unit is almost the same as supervisord's configuration.
Just copy this config to `/etc/systemd/system/php-censor@.service` with right permissions, enable 
`systemctl enable php-censor@1.service` and run it by `systemctl start php-censor@1.service`. If you want to start more 
than one worker, just create more services by template like: `php-censor@2.service`, `php-censor@3.service` etc.

```
[Unit]
Description=PHPCensor Worker %I
After=network.target

[Service]
Type=simple
ExecStart=/your/path/bin/console php-censor:worker
Restart=always

#Could be changed
User=php-censor

#Could be changed
Group=php-censor

[Install]
WantedBy=multi-user.target
```

Check that it works properly by `systemctl status php-censor@1.service`

### By Supervisord

Also you can use Supervisord to run the worker. Once you've set up PHP Censor to add your jobs to a beanstalkd queue, 
you need to start the worker so that it can pick up and run your builds. On most servers, it is best to manage this 
using supervisord. The following instructions work on Ubuntu, but will need slight amendments for other distributions.

Using your preferred text editor, create a file named `php-censor.conf` under `/etc/supervisor/conf.d`. In it, enter 
the following config:

```
[program:php-censor]
command=/path/to/php-censor/bin/console php-censor:worker
process_name=%(program_name)s_%(process_num)02d
stdout_logfile=/var/log/php-censor.log
stderr_logfile=/var/log/php-censor-err.log
user=php-censor
autostart=true
autorestart=true
environment=HOME="/home/php-censor",USER="php-censor"
numprocs=2
```

You'll need to edit the '/path/to/php-censor', the `user` value and the `environment` value to suit your server. 
The user needs to be an actual system user with suitable permissions to execute PHP and PHP Censor.

Once you've created this file, simply restart supervisord using the command `service supervisor restart` and 2 
instances of PHP Censor's worker should start immediately. You can verify this by running the command 
`ps aux | grep php-censor`, which should give you output as follows:

```
➜  ~ ps aux | grep php-censor
php-censor    19057  0.0  0.9 200244 18720 ?        S    03:00   0:01 php /php-censor/console php-censor:worker
php-censor    19058  0.0  0.9 200244 18860 ?        S    03:00   0:01 php /php-censor/console php-censor:worker
```

### Simple start with nohup (not recommended)

Also you can simple daemonise worker by `nohup`:

```
nohup /path/to/php-censor/bin/console php-censor:worker &> /var/log/php-censor-worker.log </dev/null & # and you can save pid in pidfile with echo "$!" > /var/run/php-censor-worker.pid, but it's not really necessary
```

But keep in mind: it won't restart your worker if it fails and can be inconvenient to manage worker process in contrast 
with other solutions. So, it's good for debug purposes or as temporary solution.


That's it! Now, whenever you create a new build in PHP Censor, it should start building immediately.
