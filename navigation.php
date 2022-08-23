<?php

return [
    'Getting Started' => [
        'children' => [
            'Installing PHP Censor' => [
                'url' => 'docs/installing',
                'children' => [
                    'Adding a virtual host'     => 'docs/virtual_host',
                    'Run builds using a worker' => 'docs/workers/worker',
                ],
            ],
            'Adding PHP Censor support to your projects' => 'docs/configuring_project',
            'Updating PHP Censor'                        => 'docs/updating',
            'Configuring PHP Censor'                     => 'docs/configuring_application',
            'Screenshots'                                => 'docs/screenshots',
            'Upgrade from v1 to v2'                      => 'docs/upgrade_from_1_to_2',
            'Changelog 2.1'                              => 'docs/changelog_2_1',
        ],
    ],
    'Using PHP Censor' => [
        'children' => [
            'Automatically building commits pushed to' => [
                'children' => [
                    'Git'             => 'docs/sources/git',
                    'Github (Git)'    => 'docs/sources/github',
                    'Bitbucket (Git)' => 'docs/sources/bitbucket',
                    'GitLab (Git)'    => 'docs/sources/gitlab',
                    'Gogs (Git)'      => '',
                    'Mercurial/Hg'    => '',
                    'Bitbucket (Hg)'  => '',
                    'Subversion/Svn'  => '',
                ],
            ],
            'Injecting variables into messages'     => 'docs/interpolation',
            'Project Status Images and Status Page' => 'docs/status',
            'Build environments'                    => 'docs/environments',
            'Periodical Builds'                     => 'docs/periodical_builds',
            'Console commands'                      => 'docs/commands',
            'CCMenu/CCTray integration'             => 'docs/ccmenu',
        ],
    ],
    'Plugins' => [
        'children' => [
            'Dependencies' => [
                'children' => [
                    'Composer'         => 'docs/plugins/composer',
                    'Security Checker' => 'docs/plugins/security_checker',
                ],
            ],
            'Tests' => [
                'children' => [
                    'Atoum'       => 'docs/plugins/atoum',
                    'Behat'       => 'docs/plugins/behat',
                    'Codeception' => 'docs/plugins/codeception',
                    'PHP Unit'    => 'docs/plugins/php_unit',
                    'PHP Spec'    => 'docs/plugins/php_spec',
                ],
            ],
            'Code Style' => [
                'children' => [
                    'Lint'                       => 'docs/plugins/lint',
                    'PDepend'                    => 'docs/plugins/pdepend',
                    'Phan'                       => 'docs/plugins/phan',
                    'Psalm'                      => 'docs/plugins/psalm',
                    'PHPStan'                    => 'docs/plugins/php_stan',
                    'Pahout'                     => 'docs/plugins/pahout',
                    'Phlint'                     => 'docs/plugins/phlint',
                    'PHP Code Sniffer'           => 'docs/plugins/php_code_sniffer',
                    'PHP Copy/Paste Detector'    => 'docs/plugins/php_cpd',
                    'PHP Coding Standards Fixer' => 'docs/plugins/php_cs_fixer',
                    'PHP Docblock Checker'       => 'docs/plugins/php_docblock_checker',
                    'PHP Loc'                    => 'docs/plugins/php_loc',
                    'PHP Mess Detector'          => 'docs/plugins/php_mess_detector',
                    'PHP Parallel Lint'          => 'docs/plugins/php_parallel_lint',
                    'PHP Tal Lint'               => 'docs/plugins/php_tal_lint',
                    'Technical Debt'             => 'docs/plugins/technical_debt',
                    'SensioLabs Insight'         => 'docs/plugins/sensiolabs_insight',
                ],
            ],
            'Databases' => [
                'children' => [
                    'MySQL'      => 'docs/plugins/mysql',
                    'PostgreSQL' => 'docs/plugins/pgsql',
                    'SQLite'     => 'docs/plugins/sqlite',
                ],
            ],
            'Deployment' => [
                'children' => [
                    'Mage'        => 'docs/plugins/mage',
                    'Mage v3'     => 'docs/plugins/mage3',
                    'Phing'       => 'docs/plugins/phing',
                    'Deployer'    => 'docs/plugins/deployer',
                    'DeployerOrg' => 'docs/plugins/deployer_org',
                ],
            ],
            'Notifications' => [
                'children' => [
                    'Campfire' => 'docs/plugins/campfire_notify',
                    'Email'    => 'docs/plugins/email_notify',
                    'FlowDock' => 'docs/plugins/flowdock_notify',
                    'HipChat'  => 'docs/plugins/hipchat_notify',
                    'IRC'      => 'docs/plugins/irc_notify',
                    'Slack'    => 'docs/plugins/slack_notify',
                    'Telegram' => 'docs/plugins/telegram_notify',
                    'Webhook'  => 'docs/plugins/webhook_notify',
                    'XMPP'     => 'docs/plugins/xmpp_notify',
                ],
            ],
            'Other' => [
                'children' => [
                    'Clean Build'   => 'docs/plugins/clean_build',
                    'Copy Build'    => 'docs/plugins/copy_build',
                    'Env'           => 'docs/plugins/env',
                    'Git'           => 'docs/plugins/git',
                    'Grunt'         => 'docs/plugins/grunt',
                    'Gulp'          => 'docs/plugins/gulp',
                    'Package Build' => 'docs/plugins/package_build',
                    'Phar'          => 'docs/plugins/phar',
                    'Shell'         => 'docs/plugins/shell',
                    'Wipe'          => 'docs/plugins/wipe',
                ],
            ],
        ],
    ],
];
