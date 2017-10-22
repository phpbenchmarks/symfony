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

    export SYMFONY_ENV=$env
    composer install --no-dev --optimize-autoloader
    [ "$?" != "0" ] && exit 1

    if [ "$env" == "news" ]; then
        php app/console assets:install --symlink --env=$env
        [ "$?" != "0" ] && exit 1
        php app/console assetic:dump --env=$env
        [ "$?" != "0" ] && exit 1
    fi

    clearCacheAndLogs

    return 0
}
