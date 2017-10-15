<?php

namespace PhpBenchmarks\Bundle\HelloWorldBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HelloWorldController extends Controller
{
    /** @return Response */
    public function helloworldAction()
    {
        return new Response('Hello World !');
    }
}
