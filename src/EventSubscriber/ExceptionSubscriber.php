<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ExceptionSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
       return [
           KernelEvents::EXCEPTION => [
               ['processException', 10],
               ['logException', 0],
               ['notifyException', -10],
           ]
       ];
    }

    public function processException(GetResponseForExceptionEvent $event)
    {
        //dump('process exception');
    }

    public function logException(GetResponseForExceptionEvent $event)
    {
        //dump('log exception');
    }

    public function notifyException(GetResponseForExceptionEvent $event)
    {
        //dump('notify exception');
    }
}