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
}

function init() {
    clearCacheAndLogs

    export SYMFONY_ENV=prod
    composer install --no-dev --optimize-autoloader
    [ "$?" != "0" ] && exit 1

    php bin/console assets:install --symlink --env=prod
    [ "$?" != "0" ] && exit 1

    clearCacheAndLogs

    return 0
}
