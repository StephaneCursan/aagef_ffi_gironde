<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2019-05-09
 * Time: 15:37
 */

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Location;
use AppBundle\Form\LocationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminLocationController extends Controller
{
    /**
     * @Route("Admin/database/locations", name="locations")
     */
    public function LocationCreateAction(Request $request)
    {
        $location = new Location();

        $locationForm = $this->createForm(LocationType::class, $location);

        $locationFormView = $locationForm->createView();

        $locationForm->handleRequest($request);

        if ($locationForm->isSubmitted() && $locationForm->isValid()){

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($location);
            $entityManager->flush();

            var_dump('lieu enregistré'); die;
        }

        return $this->render('Admin/createLocation.html.twig',
            [
                'locationFormView' => $locationFormView
            ]
        );
    }
}