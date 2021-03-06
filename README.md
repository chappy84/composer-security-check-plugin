# Security Check Plugin for Composer

For global install:

    composer global require fancyguy/composer-security-check-plugin

For project install:

    composer require fancyguy/composer-security-check-plugin

Run these commands to see some sample behavior:

    mkdir insecure-project
    cd insecure-project
    composer init --name="insecure/project" --description="insecure project" -l MIT -n
    composer require symfony/symfony:2.5.2
    composer require fancyguy/composer-security-check-plugin
    composer audit
    composer audit --format=simple
    composer audit --format=json
    composer audit --format=json --output-file=report.json
    composer validate
    composer require symfony/symfony --update-with-all-dependencies
    composer audit

By default this tool uploads your `composer.lock` file to the [security.symfony.com](https://security.symfony.com/) webservice which uses the checks from https://github.com/FriendsOfPHP/security-advisories. 

You can check offline by downloading a local version of this [repo](https://github.com/FriendsOfPHP/security-advisories) and specify its path using:

    composer audit --audit-db /path/to/security-advisories

Inspired on: https://github.com/sensiolabs/security-checker 

Alternative: https://github.com/Roave/SecurityAdvisories
