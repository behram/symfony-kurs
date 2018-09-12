<?php

namespace App\Controller;

use App\Entity\Kontrol;
use App\Form\KontrolType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KontrolController extends Controller
{
    /**
     * @Route("/form-kontrol")
     */
    public function safSql(Request $request)
    {
        $kontrol = new Kontrol();

        $form = $this->createForm(KontrolType::class, $kontrol);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            return new Response('form kontrolden başarıyla geçti!');
        }

        return $this->render('kontrol/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
