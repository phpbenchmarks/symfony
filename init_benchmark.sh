#!/usr/bin/env bash

function clearCacheAndLogs() {
    sudo rm -rf app/cache/*
    sudo chmod -R 777 app/cache

    sudo rm -rf app/logs/*
    sudo chmod -R 777 app/logs
}

clearCacheAndLogs

export SYMFONY_ENV=prod
composer install --no-dev --optimize-autoloader

php app/console assets:install --symlink --env=prod
php app/console assetic:dump --env=prod

clearCacheAndLogs
