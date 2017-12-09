<?php

// /!\ /!\ /!\ /!\
// I don't use APC cause bench will sometimes results in a lot of failures
// /!\ /!\ /!\ /!\

use PhpBenchmarksSymfony\Bundle\HelloWorldBundle\HelloWorldBundle;
use Symfony\Component\HttpFoundation\Request;

require __DIR__.'/../vendor/autoload.php';
if (PHP_VERSION_ID < 70000) {
    include_once __DIR__.'/../var/bootstrap.php.cache';
}

$kernel = new AppKernel('helloworld', false, [HelloWorldBundle::class]);
if (PHP_VERSION_ID < 70000) {
    $kernel->loadClassCache();
}

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);

// require phpbenchmarks stats.php here when needed
