Adding a Virtual Host
=====================

In order to access the PHP Censor web interface, you need to set up a virtual host in your web server. 

Below are a few examples of how to do this for various different web servers.

Nginx
-----

```
server {
    charset utf-8;
    client_max_body_size 128M;

    listen *:80;

    server_name php-censor.local www.php-censor.local;
    root /var/www/php-censor.local/public;

    #access_log /var/www/php-censor.local/runtime/nginx_access.log;
    error_log  /var/www/php-censor.local/runtime/nginx_errors.log warn;

    location ~* \.(htm|html|xhtml|jpg|jpeg|gif|png|css|zip|tar|tgz|gz|rar|bz2|doc|xls|exe|pdf|ppt|wav|bmp|rtf|swf|ico|flv|txt|docx|xlsx)$ {
        try_files $uri @fpm;
        expires    30d;
    }

    location / {
        try_files $uri @fpm;
    }

    location @fpm {
        fastcgi_pass  unix:/var/run/php/php-fpm.sock;

        include fastcgi_params;

        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root/index.php;
        fastcgi_param SCRIPT_NAME index.php;
    }
}
```

Apache
------

For Apache, you can use a standard virtual host, as long as your server supports PHP. All you need to do is add the 
following to a `.htaccess` file in your PHP Censor `/public` directory.

```
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule . /index.php [L]
</IfModule>
```

- Edit virtual host in apache2.
```
<VirtualHost *:80>
    ServerAdmin  admin@php-censor.local
    DocumentRoot /var/www/php-censor.local/public
    ServerName   php-censor.local
    ServerAlias  www.php-censor.local

    <Directory /var/www/php-censor.local/public/ >
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/php-censor-error_log
    CustomLog ${APACHE_LOG_DIR}/php-censor-access_log combined
</VirtualHost>
```

- Add in `/etc/hosts` following text:
```
127.0.0.1 php-censor.local www.php-censor.local
```

PHP Built-in Server
-------------------

You can use the built-in PHP web server by `php -S localhost:8080 -t ./public/routing.php` command and adding file 
`public/routing.php` with content:

```php
<?php

if (file_exists(__DIR__ . '/' . $_SERVER['REQUEST_URI'])) {
    return false;
} else {
    include_once __DIR__ . 'index.php';
}
```
