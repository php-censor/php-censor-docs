Plugin PHP Parallel Lint
========================

Similar to the [standard PHP Lint plugin](lint.md), except that it uses the 
[PHP Parallel Lint](https://github.com/JakubOnderka/PHP-Parallel-Lint) project to run.

Configuration
-------------

### Options

See additional options below.

### Examples

```yml
test:
    php_parallel_lint_step:
        plugin: php_parallel_lint
        directory: "app"
        ignore:
            - "vendor"
            - "test"
```

### Additional Options

The following general options can also be used: 

* **allow_failures** [bool, optional] - If true, allow the build to succeed even if this plugin fails.
* **directory** [string, optional] - This option lets you specify the tests directory to run.
* **ignore** [optional] - A list of files / paths to ignore (default: build_settings > ignore).
* **binary_name** [string|array, optional] - Allows you to provide a name of the binary.
* **binary_path** [string, optional] - Allows you to provide a path to the binary vendor/bin, or a system-provided.
* **priority_path** [string, optional] - Priority path for locating the plugin binary (Allowable values: 
  `local` (Local current build path) | 
  `global` (Global PHP Censor 'vendor/bin' path) |
  `system` (OS System binaries path, /bin:/usr/bin etc.). 
  Default order: local -> global -> system)
