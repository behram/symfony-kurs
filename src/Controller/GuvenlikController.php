<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\User;
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


    /**
     * @Route("/user-detay")
     */
    public function userDetay()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        /** @var User $user */
        $user = $this->getUser();

        return new Response(sprintf('Username: %s -> password: -> %s -> roller: %s',
            $user->getUsername(),
            $user->getPassword(),
            implode($user->getRoles())));
    }

    /**
     * @Route("/user-detay-servis")
     */
    public function userDetayServis(Security $security)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        /** @var User $user */
        $user = $security->getUser();

        return new Response(sprintf('Username: %s -> password: -> %s -> roller: %s',
            $user->getUsername(),
            $user->getPassword(),
            implode($user->getRoles())));
    }

    /**
     * @Route("/user-detay-template")
     */
    public function userDetayTemplate()
    {
        return $this->render('security/user_detay.html.twig');
    }

    /**
     * @Route("/role-hierarchy")
     */
    public function roleHierarchy()
    {
        return $this->render('security/hierarchy.html.twig');
    }


}
