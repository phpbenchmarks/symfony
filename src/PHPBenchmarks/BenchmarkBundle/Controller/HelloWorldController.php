<?php

namespace PHPBenchmarks\BenchmarkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HelloWorldController extends Controller
{
    /**
     * @return Response
     */
    public function helloworldAction()
    {
        return $this->render('BenchmarkBundle::helloworld.html.twig');
    }
}
