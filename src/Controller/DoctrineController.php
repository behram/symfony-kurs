<?php

namespace App\Controller;

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

        var_dump($result);exit();
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

        var_dump($result);exit();
    }
}