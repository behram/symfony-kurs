<?php

namespace App\Behram\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BundleTestController extends Controller
{
    /**
     * @Route("/bundle-test/merhaba")
     * @return Response
     */
    public function merhaba()
    {
        return new Response('Merhaba Ben Test Bundle');
    }
}