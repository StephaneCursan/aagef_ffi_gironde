<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2019-05-06
 * Time: 20:36
 */

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Person;
use AppBundle\Form\PersonType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminPersonController extends Controller
{
    /**
     * @Route("/database/persons", name="persons")
     */
    public function PersonCreateAction(Request $request)
    {
        $person = new Person();

        $personForm = $this->createForm(PersonType::class, $person);

        $personFormView = $personForm->createView();

        $personForm->handleRequest($request);

        if ($personForm->isSubmitted() && $personForm->isValid()){

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($person);
            $entityManager->flush();

        }

        return $this->render('Admin/createPerson.html.twig',
            [
                'personFormView' => $personFormView
            ]
        );
    }
}