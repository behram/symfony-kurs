<?php

namespace App\EventSubscriber;

use App\SiparisEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class SiparisSubscriber implements EventSubscriberInterface
{
    /** @var \Swift_Mailer */
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public static function getSubscribedEvents()
    {
        return [
            SiparisEvents::KAYDEDILDI => 'siparisGeldi',
        ];
    }

    public function siparisGeldi(SiparisEvents $event)
    {
        $message = (new \Swift_Message('Yeni Sipariş Geldi Patron!'))
            ->setFrom('system@behramstore.com')
            ->setTo('patron@behramstore.com')
            ->setBody('Yeni Sipariş Ulaştı Elimize, Urun: '. $event->getUrun())
            ;

        $this->mailer->send($message);

        $event->stopPropagation();
    }
}