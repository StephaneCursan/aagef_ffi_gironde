<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2019-05-09
 * Time: 15:37
 */

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Place;
use AppBundle\Form\PlaceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminPlaceController extends Controller
{
    /**
     * @Route("Admin/database/places", name="places")
     */
    public function PlaceCreateAction(Request $request)
    {
        $place = new Place();

        $placeForm = $this->createForm(PlaceType::class, $place);

        $placeFormView = $placeForm->createView();

        $placeForm->handleRequest($request);

        if ($placeForm->isSubmitted() && $placeForm->isValid()){

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($place);
            $entityManager->flush();

            var_dump('lieu enregistré'); die;
        }

        return $this->render('Admin/createPlace.html.twig',
            [
                'placeFormView' => $placeFormView
            ]
        );
    }
}