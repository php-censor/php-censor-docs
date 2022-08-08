---
title: Plugin PHP TAL Lint
description: Plugin PHP TAL Lint
extends: _layouts.documentation
section: content
---

Plugin PHP TAL Lint
===================

PHP TAL (Template Attribute Language)  linter. https://phptal.org/

This plugin expects the composer package [phptal/phptal](https://packagist.org/packages/phptal/phptal) to be installed.

Configuration
-------------

### Options

* **allowed_warnings** [int, optional] - Allow `n` warnings in a successful build (default: 0). Use -1 to allow 
unlimited warnings.

* **allowed_errors** [int, optional] - Allow `n` errors in a successful build (default: 0). Use -1 to allow unlimited 
errors.

* **suffixes** [array, optional] - list of file extensions to inspect. Defaults to `zpt`.

### Examples

```yml
test:
    php_tal_lint_step:
        plugin: php_tal_lint
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
