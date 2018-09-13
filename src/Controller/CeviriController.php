<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\TranslatorInterface;

class CeviriController extends Controller
{
    /**
     * @Route("/ceviri", name="ceviri")
     */
    public function new(TranslatorInterface $translator)
    {
        $sayi = 1000;
        $ceviriMesaj = $translator->transChoice(
            '{0} hiç şeker yok :( | {1} sadece bir şeker var | ]1,29] %sayi% tane şeker var | [30,Inf[ Çok fazla şeker var :)',
            $sayi,
            ['%sayi%' => $sayi]
        );

        return $this->render('ceviri/index.html.twig', [
            'ceviriMesaj' => $ceviriMesaj,
        ]);
    }
}
