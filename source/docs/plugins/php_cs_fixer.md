Plugin PHP Coding Standards Fixer
=================================

Runs PHP Coding Standards Fixer against your build.

Configuration
-------------

### Options

* **verbose** [bool, optional] - Whether to run in verbose mode (default: false).
* **diff** [bool, optional] - Whether to run with the `--diff` flag enabled (default: false).
* **rules** [string, optional] - Fixer rules (default for 3.x: `@PSR12`; for 2.x: `@PSR2`). Cannot be used simultaneously with the `config` option.
* **args** [string, optional] - Command line args (in string format) to pass to PHP 
  Coding Standards Fixer (default: ``).
* **config** [string, optional] - Special config file (
  default for 3.x: `%BUILD_PATH%./.php-cs-fixer.php` or `%BUILD_PATH%./.php-cs-fixer.dist.php`;
  for 2.x: `%BUILD_PATH%./.php_cs` or `%BUILD_PATH%./.php_cs.dist`). Cannot be used simultaneously with the `rules` option.
* **errors** [bool, optional] - Not fix files, but get the number of files with problem (default: false).
* **report_errors** [bool, optional] - With **errors**, get the list of files in "Errors" tab (default: false).

### Examples

```yml
test:
    php_cs_fixer_step:
        plugin:    php_cs_fixer
        directory: "./my/dir/path" # == "%BUILD_PATH%/my/dir/path"
        args:      "--rules=@PSR12 --diff --verbose"
```

```yml
test:
    php_cs_fixer_step:
        plugin:    php_cs_fixer
        directory: "%BUILD_PATH%/my/dir/path"
        verbose:   true
        diff:      true
        rules:     "@PSR12"
```

```yml
test:
    php_cs_fixer_step:
        plugin: php_cs_fixer
        config: "./my/dir/.php_cs.special"
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
