<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DomCrawlerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $client->request('GET', '/merhaba-dunya');

        $crawler = $client->getCrawler();

        $newCrawler = $crawler
            ->filter('input[type="submit"]')
            ->last()
            ->parents()
            ->first()
        ;

        // css erişim
        $crawler->filter('h1.span');

        // 3. elemana erişim
        $crawler->eq(3);

        // ilk ve son obje
        $crawler->first();
        $crawler->last();

        // yan kardeş dom bağları
        $crawler->siblings();

        $crawler->nextAll();

        $crawler->previousAll();

        $crawler->parents();

        $crawler->children();

        $trBaglari = $crawler->filter('tr');

        $trBagiSayisi = count($trBaglari);

        // class attr a sahip olanlar
        $crawler->attr('class');

        $content = $crawler->text();
    }

    public function testForm()
    {
        $client = static::createClient();

        $client->request('GET', '/merhaba-dunya');

        $crawler = $client->getCrawler();

        $formButton = $crawler->selectButton('submit');

        $form = $formButton->form([
            'name' => 'Behram',
            'surname' => 'Celen',
        ]);

        $client->submit($form);
    }
}