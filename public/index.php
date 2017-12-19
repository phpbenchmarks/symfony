<?php

use App\Kernel;
use Symfony\Component\HttpFoundation\Request;

require __DIR__ . '/../vendor/autoload.php';

$kernel = new Kernel('restapi', true);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);

// require phpbenchmarks stats.php here when needed
