<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Cache\Adapter\AdapterInterface;

class CacheController extends Controller
{
    /**
     * @Route("/cache-test")
     */
    public function new(AdapterInterface $cache)
    {
        $cache->hasItem('isim');

        $item = $cache->getItem('isim');

        $item->set('Behram');

        $cache->save($item);

        $cache->getItem('isim');

        return new Response('<html><body>Hello</body></html>');
    }
}
