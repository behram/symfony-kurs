<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HelloControllerTest extends WebTestCase
{
    public function testHello()
    {
        $client = static::createClient();

        $client->request('GET', '/hello');

        $response = $client->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testMerhabaDunya()
    {
        $client = static::createClient();

        $client->request('GET', '/merhaba-dunya');

        $crawler = $client->getCrawler();

        $this->assertGreaterThan(0,
            $crawler->filter("html:contains('Merhaba Dünya')")->count());

        $link = $crawler
            ->filter('a:contains("Merhaba")')
            ->eq(0)
            ->link();

        $crawler = $client->click($link);
    }

    public function testMerhabaDunya2()
    {
        $client = static::createClient();

        $client->request('GET', '/merhaba-dunya');

        $this->assertContains('Merhaba', $client->getResponse()->getContent());
    }
}