#!/usr/bin/env bash

set -e

function clearCacheAndLogs() {
    rm -rf var/cache/*
    chmod -R 777 var/cache

    rm -rf var/log/*
    chmod -R 777 var/log
}

# because of Symfony Flex bug (https://github.com/symfony/symfony/issues/29581), we need to remove vendor
[ -d "vendor" ] && rm -rf vendor/
clearCacheAndLogs

composer install --no-dev --classmap-authoritative --ansi
clearCacheAndLogs

php bin/console cache:warmup
