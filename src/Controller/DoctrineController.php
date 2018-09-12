<?php

namespace App\Controller;

use App\Entity\Grup;
use App\Entity\Kategori;
use App\Entity\Urun;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DoctrineController extends Controller
{
    /**
     * @Route("/saf-sql")
     */
    public function safSql()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $sql = 'SELECT * FROM urun LIMIT 5';

        $statement = $entityManager->getConnection()->prepare($sql);

        $statement->execute();

        $result = $statement->fetchAll();

        var_dump($result);
        exit();
    }

    /**
     * @Route("/bind-saf-sql")
     */
    public function bindSafSql()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $sql = 'SELECT * FROM urun WHERE performans > :performans';

        $statement = $entityManager->getConnection()->prepare($sql);

        $statement->bindValue('performans', 8);
        $statement->execute();

        $result = $statement->fetchAll();

        var_dump($result);
        exit();
    }

    /**
     * @Route("/many-to-one-veri-kaydetme")
     */
    public function manyToOneVeriKaydetme()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $kategori = new Kategori();
        $kategori->setIsim('Spor Giyim Yeni Kategori');

        $urun = new Urun();
        $urun->setIsim('Koşu Ayakkabısı');
        $urun->setFiyat(100);
        $urun->setKategori($kategori);

        $urun1 = new Urun();
        $urun1->setIsim('Esofman');
        $urun1->setFiyat(50);
        $urun1->setKategori($kategori);

        $urun2 = new Urun();
        $urun2->setIsim('Spor Atlet');
        $urun2->setFiyat(40);
        $urun2->setKategori($kategori);

        $entityManager->persist($kategori);
        $entityManager->persist($urun);
        $entityManager->persist($urun1);
        $entityManager->persist($urun2);

        $entityManager->flush();

        return new Response(sprintf('Urun Kaydedildi ürün id: %s -> Kategori Id: %s', $urun->getId(), $kategori->getId()));
    }

    /**
     * @Route("/many-to-one-veri-inceleme/{id}")
     */
    public function manyToOneVeriInceleme(Urun $urun)
    {
        $kategori = $urun->getKategori();

        return new Response(sprintf('Urun id: %s -> kategori isim: %s', $urun->getId(), $kategori->getIsim()));
    }

    /**
     * @Route("/one-to-many-veri-inceleme/{id}")
     */
    public function oneToManyVeriInceleme(Kategori $kategori)
    {
        $urunler = $kategori->getUrunler();

        foreach ($urunler as $urun){
            echo $urun->getIsim().'<hr>';
        }
        return new Response('');
    }

    /**
     * @Route("/relation-query-builder-inceleme/{id}")
     */
    public function relationQueryBuilder(Kategori $kategori)
    {
        $em = $this->getDoctrine()->getManager();
        $urunRepo = $em->getRepository(Urun::class);

        $urunler = $urunRepo->findByCategory($kategori);

        foreach ($urunler as $urun){
            echo $urun->getIsim().'<hr>';
        }
        return new Response('');
    }

    /**
     * @Route("/many-to-many-veri-kaydetme")
     */
    public function manyToManyVeriKaydetme()
    {
        $em = $this->getDoctrine()->getManager();

        $user1 = new User();
        $user1->setIsim('Behram');
        $user1->setUsername('behramcelen');

        $user2 = new User();
        $user2->setIsim('Selim');
        $user2->setUsername('slmyldz');

        $user3 = new User();
        $user3->setIsim('Harun');
        $user3->setUsername('harunglc');

        $grup1 = new Grup();
        $grup1->setIsim('Admin');

        $grup2 = new Grup();
        $grup2->setIsim('Editor');

        $grup1->addUser($user1);
        $grup1->addUser($user2);

        $grup2->addUser($user2);
        $grup2->addUser($user3);

        $em->persist($user1);
        $em->persist($user2);
        $em->persist($user3);
        $em->persist($grup1);
        $em->persist($grup2);

        $em->flush();


        return new Response('');
    }



}
