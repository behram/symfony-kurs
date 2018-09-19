<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TestControllerTest extends WebTestCase
{
    public function testTestMe()
    {
        $client = static::createClient();

        $client->request('GET', '/test-me');

        $crawler = $client->getCrawler();
        $form = $crawler->selectButton('Submit')->form();

        $form['form[name]'] = 'Behram';
        $form['form[password]'] = '123456';

        $client->submit($form);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testMostCommon()
    {
        $client = static::createClient();

        $client->request('GET', '/test-me');

        $crawler = $client->getCrawler();
        $this->assertTrue(true);

        //$this->assertCount(3, $crawler->filter('h4'));

        //$this->assertTrue(
        //    $client->getResponse()->headers->contains('Content-Type', 'application/json'),
        //    'response header contains application/json'
        //);

        //$this->assertTrue($client->getResponse()->isSuccessful());

        //$this->assertTrue($client->getResponse()->isNotFound());

        //$this->assertEquals(200, $client->getResponse()->getStatusCode());

        //$this->assertTrue($client->getResponse()->isRedirect('/redirect/url'));

        //$this->assertTrue($client->getResponse()->isRedirect());
    }

    /**
     * @dataProvider provideUrls
     */
    public function testSayfaBasarilimi($url)
    {
        $client = self::createClient();

        $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function provideUrls()
    {
        return [
            ['/hello'],
            ['/test-me'],
        ];
    }

    public function testRequest()
    {
        $client = self::createClient();

        $client->request(
            'GET',
            '/hello',
            array(),
            array(),
            array('PHP_AUTH_USER' => 'username', 'PHP_AUTH_PW' => 'pa$$word')
        );
        $this->assertTrue($client->getResponse()->isSuccessful());

        //$this->assertTrue($client->getResponse()->isSuccessful());

        //$client->request(
        //    'POST',
        //    '/submit'
        //    [],
        //    [],
        //    ['CONTENT-TYPE' => 'application/json', '{"name": "Behram"}']
        //();

        // ajax request
        //$client->xmlHttpRequest('POST', '/submit', ['name' => 'Behram']);
    }
}