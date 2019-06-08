<?php

namespace AppBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminHomeController extends Controller
{
    /**
     * @Route("/admin", name="adminHome")
     */
    public function AdminIndexAction(Request $request)
    {
        $breadcrumbs = $this->get('white_october_breadcrumbs');
        $breadcrumbs->addRouteItem('Interface d\'administration', 'adminHome');

        return $this -> render('admin/adminHome.html.twig');
    }
}