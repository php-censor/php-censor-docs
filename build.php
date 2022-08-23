#!/usr/bin/env php
<?php

declare(strict_types=1);

const ROOT_DIR = __DIR__;

\chdir(ROOT_DIR . '/source');

\exec('git clone https://github.com/php-censor/php-censor.git "docs-raw"');

\mkdir('docs/plugins', 0755, true);
\mkdir('docs/sources', 0755, true);
\mkdir('docs/workers', 0755, true);

\exec('cp --recursive --no-target-directory "docs-raw/docs/images" "assets/img/docs"');
\exec('cp --recursive --no-target-directory "docs-raw/docs/screenshots" "assets/img/docs/screenshots"');

$config = require 'navigation.php';

$result = [];

function parse(array $config, &$result): void {
    foreach ($config as $name => $value) {
        if (\is_string($value)) {
            if ($value) {
                $result[$value] = $name;
            }

            continue;
        }

        if (!empty($value['children'])) {
            if (isset($value['url']) && $value['url']) {
                $result[$value['url']] = $name;
            }

            \parse($value['children'], $result);

            continue;
        }

        \parse($value, $result);
    }
}

\parse($config, $result);

foreach ($result as $path => $title) {
    $newPath = 'docs-raw/docs/en/' . \substr($path, \strlen('docs/'));
    if ('docs/upgrade_from_1_to_2' === $path) {
        $newPath = 'docs-raw/docs/UPGRADE_2.0';
    }
    if ('docs/changelog_2_1' === $path) {
        $newPath = 'docs-raw/CHANGELOG';
    }

    $content = \file_get_contents($newPath . '.md');
    $content = \str_replace(['../screenshots/', '../images/'], ['/assets/img/docs/screenshots/', '/assets/img/docs/'], $content);

    $prefix = "---
title: {$title}
description: {$title}
extends: _layouts.documentation
section: content
---

";
    \file_put_contents($path . '.md', \sprintf('%s%s', $prefix, $content));
}

\exec('rm --force --recursive --verbose "docs-raw"');
