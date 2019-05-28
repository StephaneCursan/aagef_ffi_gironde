<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function redirectAction()
    {
        $authChecker = $this->container->get('security.authorization_checker');

        if ($authChecker->isGranted('ROLE_ADMIN'))
        {
            return $this->render('admin/adminHome.html.twig');
        } elseif ($authChecker->isGranted('ROLE_USER')) {
            return new RedirectResponse($this->generateUrl('homepage'));
        } else {
            return $this->render('FOSUserBundle/views/Security/login.html.twig');
        }
    }
}