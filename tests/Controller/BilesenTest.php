<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BilesenTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $client->request('GET', '/merhaba-dunya');

        // history
        $history = $client->getHistory();

        //cookies
        $cookie = $client->getCookieJar();

        // request
        $request = $client->getRequest();

        //response
        $response = $client->getResponse();

        // crawler
        $crawler = $client->getCrawler();

        //container
        $container = self::$container;

        // logger
        $logger = $container->get('logger');

        // host param
        $host = $container->getParameter('env(DATABASE_URL)');

        // entity manager
        $entityManager = $container->get('doctrine')->getManager();

        $this->assertTrue(true);
    }
}