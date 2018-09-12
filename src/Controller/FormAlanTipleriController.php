<?php

namespace App\Controller;

use App\Form\AlanTipleriType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormAlanTipleriController extends Controller
{

    /**
     * @return Response
     * @Route("/form-alan-tipleri")
     */
    public function new(Request $request)
    {
        $form = $this->createForm(AlanTipleriType::class);

        return $this->render('form-alan-tipleri/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
