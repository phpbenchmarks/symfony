<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class HelloWorldController
{
    public function __invoke(): Response
    {
        return new Response('Hello World !');
    }
}
