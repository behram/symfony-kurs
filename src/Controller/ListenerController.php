<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListenerController extends Controller
{
    /**
     * @Route("/listener")
     * @return Response
     */
    public function new()
    {
        return new Response('Listener content!');
    }
}
