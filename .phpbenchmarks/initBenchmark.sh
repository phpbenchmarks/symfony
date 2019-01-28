#!/usr/bin/env bash

function clearCacheAndLogs() {
    rm -rf var/cache/*
    [ "$?" != "0" ] && exit 1
    chmod -R 777 var/cache
    [ "$?" != "0" ] && exit 1

    rm -rf var/log/*
    [ "$?" != "0" ] && exit 1
    chmod -R 777 var/log
    [ "$?" != "0" ] && exit 1
}

function initBenchmark() {
    # because of Symfony Flex bug (https://github.com/symfony/symfony/issues/29581), we need to remove vendor
    rm -rf vendor/
    clearCacheAndLogs

    composer install --no-dev --classmap-authoritative
    [ "$?" != "0" ] && exit 1

    clearCacheAndLogs
    php bin/console cache:warmup

    return 0
}
