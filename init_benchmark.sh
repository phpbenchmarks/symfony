#!/usr/bin/env bash

function clearCacheAndLogs() {
    sudo /bin/rm -rf var/cache/*
    [ "$?" != "0" ] && exit 1
    sudo /bin/chmod -R 777 var/cache
    [ "$?" != "0" ] && exit 1

    sudo /bin/rm -rf var/log/*
    [ "$?" != "0" ] && exit 1
    sudo /bin/chmod -R 777 var/log
    [ "$?" != "0" ] && exit 1

    php bin/console cache:warmup
}

function init() {
    local type=$1
    if [ "$type" == "1" ]; then
        env="helloworld";
    elif [ "$type" == "2" ]; then
        env="news";
    else
        env="rest"
    fi

    clearCacheAndLogs

    export APP_ENV=$env
    composer install --no-dev --classmap-authoritative
    [ "$?" != "0" ] && exit 1

    if [ "$env" == "news" ]; then
        php bin/console assets:install --symlink --env=$env
        [ "$?" != "0" ] && exit 1
        php bin/console assetic:dump --env=$env
        [ "$?" != "0" ] && exit 1
    fi

    clearCacheAndLogs

    return 0
}
