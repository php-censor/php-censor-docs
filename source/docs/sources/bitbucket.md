---
title: Automatically building commits pushed to Bitbucket
description: Automatically building commits pushed to Bitbucket
extends: _layouts.documentation
section: content
---

Automatically building commits pushed to Bitbucket
==================================================

If you would like your builds to run automatically whenever there is a commit or other similar activity in your 
Bitbucket repository, perform the following steps:

1. Log into PHP Censor.
2. Click on your Bitbucket project.
3. Copy the web hook link specified on the right.
4. Log into Bitbucket and go to your repo.
5. Click the settings cog icon at the top right of the page.
6. Click on "Hooks" in the left hand menu
7. Select "POST" from the drop-down and click "Add hook"
8. Paste the web hook link you copied above, and press save.
