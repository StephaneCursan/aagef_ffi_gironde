<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2019-05-18
 * Time: 09:52
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Person;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class PersonController extends Controller
{
    /**
     * @Route("/recherche_nominative", name="person_search")
     */
    public function findByLastNameAction()
    {
        $personRepository = $this->getDoctrine()
            ->getRepository(Person::class);
        $personList = $personRepository->findByLastName();

        return $this -> render('searchPerson.html.twig',
            [
                'personList' => $personList
            ]
        );
    }
}