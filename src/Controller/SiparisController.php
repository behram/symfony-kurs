<?php

namespace App\Controller;

use App\SiparisEvents;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class SiparisController extends AbstractController
{
    /**
     * @param EventDispatcherInterface $dispatcher
     * @param Request $request
     * @Route("/siparis-ver", name="siparis_ver")
     * @return Response
     */
    public function index(EventDispatcherInterface $dispatcher, Request $request)
    {
        $urun = $request->get('urun');
        if(empty($urun)){
            throw new NotFoundHttpException('Ürün Bulunamadı');
        }
        //ürünün sipariş edildiğini duyuralım
        $dispatcher->dispatch(SiparisEvents::KAYDEDILDI, new SiparisEvents($urun));

        return new Response(sprintf('<html><body>Ürün Siparişiniz Kaydedildi,Urun: %s</body></html>', $urun));
    }
}
