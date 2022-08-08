---
title: Plugin Clean build
description: Plugin Clean build
extends: _layouts.documentation
section: content
---

Plugin Clean build
==================

Works through a list of files to remove from your build. Useful when used in combination with Copy Build or Package 
Build.

Configuration
-------------

### Options

* **remove** - Required - An array of files and / or directories to remove.

### Examples

```yml
complete:
    clean_build_step:
        plugin: clean_build
        remove:
            - composer.json
            - composer.phar
            - config.dev.php
```
