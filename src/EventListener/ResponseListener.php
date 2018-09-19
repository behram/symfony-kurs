<?php

namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class ResponseListener
{
    public function onKernelResponse(FilterResponseEvent $event)
    {
        $response = $event->getResponse();
        $response->headers->set('Name', 'Behram');

        $content = $response->getContent();
        $response->setContent($content.'Merhaba Tuna');
    }
}