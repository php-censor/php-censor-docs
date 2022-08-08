---
title: Plugin Env
description: Plugin Env
extends: _layouts.documentation
section: content
---

Plugin Env
==========

Sets environment variables on the PHP Censor server for the build.

Configuration
-------------

None.

### Examples

```yml
setup:
    env_step:
        plugin: env
        APPLICATION_ENV: "development"
```
