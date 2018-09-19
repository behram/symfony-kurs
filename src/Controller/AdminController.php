<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends Controller
{

    /**
     * @Route("/admin")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request)
    {
        return new Response('<html><body>Admin Sayfası!</body></html>');
    }
}
