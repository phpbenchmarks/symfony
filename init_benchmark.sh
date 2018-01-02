#!/usr/bin/env bash

function clearCacheAndLogs() {
    sudo /bin/rm -rf var/cache/*
    [ "$?" != "0" ] && exit 1
    sudo /bin/chmod -R 777 var/cache
    [ "$?" != "0" ] && exit 1

    sudo /bin/rm -rf var/logs/*
    [ "$?" != "0" ] && exit 1
    sudo /bin/chmod -R 777 var/logs
    [ "$?" != "0" ] && exit 1

    php bin/console cache:warmup
}

function init() {
    export APP_ENV='prod'

    clearCacheAndLogs

    composer install --no-dev --classmap-authoritative
    [ "$?" != "0" ] && exit 1

    clearCacheAndLogs

    return 0
}
