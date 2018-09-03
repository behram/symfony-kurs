<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TemplateExtensionController extends AbstractController
{
    /**
     * @Route("/template-extension", name="template_extension")
     * @return Response
     */
    public function index()
    {
        return $this->render("template-extension/index.html.twig", [
            'sentence' => 'Merhaba Ben Behram!',
        ]);
    }
}
