@extends('_layouts.master')

@section('body')
<section class="container max-w-8xl mx-auto px-6 md:px-8 py-4">
    <div class="flex flex-col-reverse mb-10 lg:flex-row lg:mb-24">
        <div class="mt-8">
            <h1 id="intro-docs-template">{{ $page->siteName }}</h1>

            <h2 id="intro-powered-by-jigsaw" class="font-light mt-4">{{ $page->siteDescription }}</h2>
            <p>Current stable version is <strong><a href="https://github.com/php-censor/php-censor/releases/tag/2.1.2" title="PHP Censor version 2.1.2">2.1.2</a></strong></p>

            <div class="flex my-10">
                <a href="/docs/installing" title="{{ $page->siteName }} Documentation" class="bg-blue-500 hover:bg-blue-600 font-normal text-white hover:text-white rounded mr-4 py-2 px-6">Documentation</a>

                <a href="https://github.com/php-censor" title="{{ $page->siteName }} Github" class="bg-gray-400 hover:bg-gray-500 text-blue-900 font-normal hover:text-white rounded py-2 px-6">Github</a>
            </div>
        </div>

        <img src="/assets/img/dashboard.png" alt="{{ $page->siteName }}" class="ml-6 mx-auto mb-6 lg:mb-0 ">
    </div>

    <hr class="block my-8 border lg:hidden">

    <div class="md:flex -mx-2 -mx-4">
        <div class="mb-8 mx-3 px-2 md:w-1/3">
            <h3 id="intro-laravel" class="text-2xl text-blue-900 mb-0">Sources</h3>

            <p>Clone project from different sources like GitHub, Bitbucket (Git/Hg), GitLab, Git, Hg (Mercurial), SVN (Subversion) and local directory.</p>
        </div>

        <div class="mb-8 mx-3 px-2 md:w-1/3">
            <h3 id="intro-markdown" class="text-2xl text-blue-900 mb-0">Code quality tools</h3>

            <p>PHP Censor written in PHP and designed specifically for PHP projects and out of box Integrated with PHPUnit, PHPMD, PHPCPD, PHPCS, Pdepend and more.</p>
        </div>

        <div class="mx-3 px-2 md:w-1/3">
            <h3 id="intro-mix" class="text-2xl text-blue-900 mb-0">Notifications</h3>

            <p>Send notifications to Email, XMPP, Slack, IRC, Flowdock, HipChat and Telegram.</p>
        </div>
    </div>
</section>
@endsection
