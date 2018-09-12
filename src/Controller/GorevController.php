<?php

namespace App\Controller;

use App\Entity\Gorev;
use App\Entity\Grup;
use App\Entity\Kategori;
use App\Entity\Urun;
use App\Entity\User;
use App\Form\GorevType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GorevController extends Controller
{

    /**
     * @return Response
     * @Route("/yeni-gorev", name="yeni_gorev")
     */
    public function new(Request $request)
    {
        $gorev = new Gorev();

        $form = $this->createForm(GorevType::class, $gorev);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();

            /** @var Gorev $gorev */
            $gorev = $form->getData();
            $em->persist($gorev);
            $em->flush();

            return $this->redirectToRoute('gorevler');

        }

        return $this->render('gorev/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @return Response
     * @Route("/gorevler", name="gorevler")
     */
    public function list()
    {
        $em = $this->getDoctrine()->getManager();
        $gorevler = $em->getRepository(Gorev::class)->findAll();

        return $this->render('gorev/index.html.twig', [
            'gorevler' => $gorevler,
        ]);
    }
}
