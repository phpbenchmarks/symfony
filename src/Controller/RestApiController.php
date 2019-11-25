<?php

namespace App\Controller;

use App\Event\DefineRandomLocaleEvent;
use PhpBenchmarksRestData\Service;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class RestApiController extends Controller
{
    public function __invoke(EventDispatcherInterface $eventDispatcher, SerializerInterface $serializer): JsonResponse
    {
        $eventDispatcher->dispatch(new DefineRandomLocaleEvent(), DefineRandomLocaleEvent::EVENT_NAME);

        return new JsonResponse($serializer->normalize(Service::getUsers(), JsonEncoder::FORMAT));
    }
}
