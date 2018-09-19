<?php

namespace App;

use Symfony\Component\EventDispatcher\Event;

final class SiparisEvents extends Event
{
    const KAYDEDILDI = 'siparis.kaydedildi';

    /**
     * @var string
     */
    private $urun;

    public function __construct(string $urun)
    {
        $this->urun = $urun;
    }

    /**
     * @return string
     */
    public function getUrun(): string
    {
        return $this->urun;
    }
}