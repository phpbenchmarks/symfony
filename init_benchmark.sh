#!/usr/bin/env bash

function clearCacheAndLogs() {
    sudo /bin/rm -rf app/cache/*
    [ "$?" != "0" ] && exit 1
    sudo /bin/chmod -R 777 app/cache
    [ "$?" != "0" ] && exit 1

    sudo /bin/rm -rf app/logs/*
    [ "$?" != "0" ] && exit 1
    sudo /bin/chmod -R 777 app/logs
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
