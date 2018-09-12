<?php

namespace App\Controller;

use App\Entity\Gorev;
use App\Entity\Konferans;
use App\Form\GorevType;
use App\Form\KonferansType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KonferansController extends Controller
{

    /**
     * @return Response
     * @Route("/yeni-konferans", name="yeni_konferans")
     */
    public function new(Request $request)
    {
        $konferans = new Konferans();

        $form = $this->createForm(KonferansType::class, $konferans);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            /** @var UploadedFile $file */
            $file = $form->get('afis')->getData();

            $fileName = $this->rasgeleIsim().'.'.$file->guessExtension();

            $file->move($this->getParameter('afis_folder'), $fileName);
            $konferans->setAfis($fileName);

            $em->persist($konferans);
            $em->flush();

            return $this->redirectToRoute('konferanslar');
        }

        return $this->render('konferans/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @return Response
     * @Route("/konferanslar", name="konferanslar")
     */
    public function list()
    {
        $em = $this->getDoctrine()->getManager();
        $konferanslar = $em->getRepository(Konferans::class)->findAll();

        return $this->render('konferans/index.html.twig', [
            'konferanslar' => $konferanslar,
        ]);
    }

    private function rasgeleIsim()
    {
        return md5(uniqid());
    }
}
