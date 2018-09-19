<?php

namespace App\Controller;

use App\Entity\Gorev;
use App\Form\GorevType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

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
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function list(AuthorizationCheckerInterface $authChecker)
    {
        // 1. yöntem
        // $this->denyAccessUnlessGranted('ROLE_USER', null, 'Buraya erişim yetkiniz bulunmamakta!');

        // 2. yöntem
        //if(false === $authChecker->isGranted('ROLE_ADMIN')){
        //    throw new AccessDeniedException('Buraya erişim yetkiniz bulunmamakta!');
        //}

        $em = $this->getDoctrine()->getManager();
        $gorevler = $em->getRepository(Gorev::class)->findAll();

        return $this->render('gorev/index.html.twig', [
            'gorevler' => $gorevler,
        ]);
    }

    /**
     * @return Response
     * @Route("/gorevler/sil/{id}", name="gorev-sil")
     */
    public function remove(Gorev $gorev, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $gonderilenToken = $request->request->get('token');

        if($this->isCsrfTokenValid('gorev-sil', $gonderilenToken)){
            $em->remove($gorev);
            $em->flush();
            return new Response('Başarıyla Silindi!');
        }

        return new Response('Geçersiz Token');
    }
}
