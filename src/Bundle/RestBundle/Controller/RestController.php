<?php

namespace PhpBenchmarks\Bundle\RestBundle\Controller;

use PhpBenchmarks\EventListener\DefineLocaleEventListener;
use PhpBenchmarksRestType\Service;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RestController extends Controller
{
    /** @return Response */
    public function restAction()
    {
        $this->get('event_dispatcher')->dispatch(DefineLocaleEventListener::EVENT_NAME);

        return new JsonResponse($this->get('serializer')->normalize(Service::getUsers(), 'json'));
    }
}
