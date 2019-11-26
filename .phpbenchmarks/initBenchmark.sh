#!/usr/bin/env bash

set -e

function clearCacheAndLogs() {
    if [ -d var/cache ]; then
        rm -rf var/cache/*
        chmod -R 777 var/cache
    fi

    if [ -d var/log ]; then
        rm -rf var/log/*
        chmod -R 777 var/log
    fi
}

# because of Symfony Flex bug (https://github.com/symfony/symfony/issues/29581), we need to remove vendor
[ -d "vendor" ] && rm -rf vendor/
clearCacheAndLogs

composer install --no-dev --classmap-authoritative --ansi
composer dump-env prod
clearCacheAndLogs

php bin/console cache:warmup
