<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\Cache\Adapter\RedisAdapter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CacheController extends Controller
{
    /**
     * @Route("/cache-test")
     * @param Request $request
     * @param AdapterInterface $cache
     * @return Response
     * @throws \Psr\Cache\InvalidArgumentException
     */
    public function new(Request $request, AdapterInterface $cache)
    {
        $client = RedisAdapter::createConnection('redis://127.0.0.1');
        $redis = new RedisAdapter($client);
        $jale = $redis->getItem('jale');
        $jale->set('Canımsın');
        $redis->save($jale);

        dump($jale);


        $cache->hasItem('isim');

        $item = $cache->getItem('isim');

        $item->set('Behram');

        $cache->save($item);

        $cache->getItem('isim');

        $cache->deleteItem('isim');

        return new Response('Hello');
    }
}
