<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProfilerTest extends WebTestCase
{
    public function testProfile()
    {
        $client = self::createClient();

        $client->enableProfiler();

        $client->request('GET', '/merhaba-dunya');

        $profile = $client->getProfile();

        $this->assertTrue($client->getResponse()->isSuccessful());
    }
}