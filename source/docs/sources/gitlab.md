Automatically building commits pushed to GitLab
===============================================

If you would like your builds to run automatically whenever there is a commit or other similar activity in your 
GitLab repository, perform the following steps:

1. Log into PHP Censor.
2. Click on your Gitlab project.
3. Copy the web hook link specified on the left.
4. Log into Gitlab and go to your repo.
5. Click the "settings" tab in the top right corner of the page.
6. Click on "Web Hooks".
7. Paste the link you copied from PHP Censor into the "URL" textbox.
8. Select the events which you want to trigger a PHP Censor build. The default and recommended setup is to only enable 
"push events."
9. Click "Add Web Hook," and verify that the test was successful.
