<?php

use Symfony\Component\Dotenv\Dotenv;

require dirname(__DIR__) . '/vendor/autoload.php';

$env = @include dirname(__DIR__) . '/.env.local.php';
if (is_array($env)) {
    $_SERVER += $env;
    $_ENV += $env;
} else {
    (new Dotenv())->loadEnv(dirname(__DIR__) . '/.env');
}

$_SERVER['APP_ENV'] = ($_SERVER['APP_ENV'] ?? $_ENV['APP_ENV'] ?? null) ?: 'dev';
$_ENV['APP_ENV'] = $_SERVER['APP_ENV'];

$_SERVER['APP_DEBUG'] = $_SERVER['APP_DEBUG'] ?? $_ENV['APP_DEBUG'] ?? 'prod' !== $_SERVER['APP_ENV'];
$_SERVER['APP_DEBUG'] = (int) $_SERVER['APP_DEBUG'] || filter_var($_SERVER['APP_DEBUG'], FILTER_VALIDATE_BOOLEAN)
    ? '1'
    : '0';
$_ENV['APP_DEBUG'] = $_SERVER['APP_DEBUG'];
