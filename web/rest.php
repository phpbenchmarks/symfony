<?php

// /!\ /!\ /!\ /!\
// I don't use APC cause bench will sometimes results in a lot of failures
// /!\ /!\ /!\ /!\

use PhpBenchmarksSymfony\Bundle\RestBundle\RestBundle;
use Symfony\Component\HttpFoundation\Request;

$loader = require __DIR__.'/../app/autoload.php';
include_once __DIR__.'/../var/bootstrap.php.cache';

$kernel = new AppKernel('rest', false, [RestBundle::class]);
$kernel->loadClassCache();

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);