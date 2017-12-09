<?php

// /!\ /!\ /!\ /!\
// I don't use APC cause bench will sometimes results in a lot of failures
// /!\ /!\ /!\ /!\

use PhpBenchmarksSymfony\Bundle\RestBundle\RestBundle;
use Symfony\Component\HttpFoundation\Request;

$loader = require_once __DIR__.'/../app/bootstrap.php.cache';

require_once __DIR__ . '/../app/AppKernel.php';
require_once __DIR__ . '/../app/AppCache.php';

$kernel = new AppKernel('rest', false, [RestBundle::class]);
$kernel->loadClassCache();
$kernel = new AppCache($kernel);

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);

// require phpbenchmarks stats.php here when needed
