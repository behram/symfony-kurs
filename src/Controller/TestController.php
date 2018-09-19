<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends Controller
{
    /**
     * @Route("/test-me")
     * @return Response
     */
    public function testMe(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('name')
            ->add('password')
            ->add('submit', SubmitType::class)
            ->getForm();

        return $this->render('test/test_me.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}