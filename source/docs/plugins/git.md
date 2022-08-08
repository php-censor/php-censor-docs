---
title: Plugin Git
description: Plugin Git
extends: _layouts.documentation
section: content
---

Plugin Git
==========

Runs git command for an specific branch. Supports `merge`, `tag`, `pull` and `push` commands

Configuration
-------------

### Examples

```yml
complete:
    git_step:
        plugin: git
        master:           #<-- branch
            tag:          #<-- action
                name: ""  #<-- Action options
    
```

**Note:** Each action has its own options. 
