<?php

namespace App\Controller;

use App\Entity\Urun;
use App\Service\MessageGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RepositoryController extends Controller
{
    /**
     * @Route("/repository/test/{fiyat}")
     * @return Response
     */
    public function index($fiyat)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $urunRepo = $entityManager->getRepository(Urun::class);

        return $this->render('urun/index.html.twig', [
            'urunler' => $urunRepo->findAllGreateThan($fiyat)
        ]);
    }
}