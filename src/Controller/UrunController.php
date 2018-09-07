<?php

namespace App\Controller;

use App\Entity\Urun;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class UrunController extends AbstractController
{
    /**
     * @Route("/urunler", name="urun_index")
     * @return Response
     */
    public function index()
    {
        $urunRepository = $this->getDoctrine()->getRepository(Urun::class);

        $urunler = $urunRepository->findAll();

        return $this->render('urun/index.html.twig', [
            'urunler' => $urunler,
        ]);
    }

    /**
     * @Route("/urunler/create", name="urun_create")
     * @return Response
     */
    public function create()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $urun = new Urun();
        $urun
            ->setIsim('Behram Gömlek')
            ->setAciklama('Yırtılmaz Mükemmel Gömlek')
            ->setFiyat(100)
            ;

        $entityManager->persist($urun);

        $entityManager->flush();

        return new Response(sprintf('Urun başarı ile Oluşturuldu Id: %s', $urun->getId()));
    }

    /**
     * @Route("/urunler/{slug}", name="urun_show")
     * @return Response
     * @ParamConverter("urun", options={"mapping" : {"slug": "comment_slug"}})
     */
    public function show(Urun $urun)
    {
        return new Response(sprintf('Urun başarı alındı Id: %s', $urun->getId()));
    }

    /**
     * @Route("/urunler/update/{id}", name="urun_update")
     * @return Response
     */
    public function update($id, Request $request)
    {
        $isim = $request->get('isim');
        $entityManager = $this->getDoctrine()->getManager();
        $urunRepository = $entityManager->getRepository(Urun::class);

        $urun = $urunRepository->find($id);

        $urun
            ->setIsim($isim)
            ->setFiyat(rand(10,100))
            ;

        $entityManager->persist($urun);

        $entityManager->flush();

        return new Response(sprintf('Urun başarı güncellendi Id: %s', $urun->getId()));
    }

    /**
     * @Route("/urunler/delete/{id}", name="urun_delete")
     * @return Response
     */
    public function delete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $urun = $entityManager->getRepository(Urun::class)->find($id);

        if(!$urun){
            $this->createNotFoundException('Urun Bulunamadı!');
        }

        $entityManager->remove($urun);
        $entityManager->flush();

        return new Response('Urun başarıyla silindi');
    }
}
