<?php

namespace App\Tests\Util;

use App\Util\Hesaplama;
use PHPUnit\Framework\TestCase;

class HesaplamaTest extends TestCase
{
    public function testCarp()
    {
        $hesaplama = new Hesaplama();
        $sonuc = $hesaplama->carp(4,8);

        //sonuc karşılaştırması
        $this->assertEquals(32, $sonuc);
    }
}