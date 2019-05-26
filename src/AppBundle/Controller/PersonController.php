<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2019-05-18
 * Time: 09:52
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Person;
use AppBundle\Form\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PersonController extends Controller
{
    /**
     * @Route("/recherche_nominative", name="person_search")
     */
    public function searchPersonAction(Request $request)
    {
        $searchForm = $this->createForm(SearchType::class);

        $searchFormView = $searchForm->createView();

        $searchForm->handleRequest($request);

        if ($searchForm->isSubmitted() && $searchForm->isValid())
        {
            $search = $searchForm->getData()['search'];

            $personRepository = $this->getDoctrine()
                ->getRepository(Person::class);
            $personList = $personRepository->searchByLastName(['lastName' => $search]);

            return $this->render('searches/showPerson.html.twig',
                [
                    'personList' => $personList
                ]
            );
        }

        return $this -> render('searches/searchPerson.html.twig',
            [
                'searchFormView' => $searchFormView,
            ]
        );
    }
}