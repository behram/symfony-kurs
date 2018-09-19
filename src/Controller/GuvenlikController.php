<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class GuvenlikController extends Controller
{
    /**
     * @return Response
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        $sonKullaniciAdi = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $sonKullaniciAdi,
            'error' => $error,
        ]);
    }

    /**
     * @Route("/yetkiye-gore-yazi")
     */
    public function yetkiliTemplate()
    {
        // IS_AUTHENTICATED_REMEMBERED
        // IS_AUTHENTICATED_FULLY
        // IS_AUTHENTICATED_ANONYMOUSLY
        //$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('security/yetki.html.twig');
    }
}
