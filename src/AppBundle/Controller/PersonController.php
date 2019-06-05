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
        $breadcrumbs = $this->get('white_october_breadcrumbs');
        $breadcrumbs->addRouteItem('Base de données', 'person_search');
        $breadcrumbs->prependRouteItem('Accueil', 'homepage');
        // création du gabarit de formulaire
        $searchForm = $this->createForm(SearchType::class);
        // utilisation du gabarit pour créer une vue du formulaire
        // destinée à être envoyée dans un fichier twig
        $searchFormView = $searchForm->createView();
        // je récupère la variable $request qui contient les données de la requête,
        // et notamment celles de la superglobale $_POST
        $searchForm->handleRequest($request);
        // je récupère la variable $searchForm qui contient désormais le formulaire
        // avec les données de la requête, et je vérifie qu'elles ont été correctement
        // envoyées et qu'elles sont valides
        if ($searchForm->isSubmitted() && $searchForm->isValid()) {
            $search = $searchForm->getData()
            ['search'];
            // je récupère une instance de Doctrine
            $personRepository = $this->getDoctrine()
                // je récupère le repository de l'entité Person
                // qui me permet d'effectuer des requêtes dans la BDD
                ->getRepository(Person::class);
            // j'utilise une méthode définie dans le repository de l'entité Person
            // pour récupérer les éléments de la table Person dont la colonne 'lastName'
            // contient celui saisi dans le formulaire
            $personList = $personRepository->searchByLastName(['lastName' => $search]);
            // j'appelle un fichier twig, et je lui passe en paramètre 'personList'
            // qui contient les données de la BDD récupérées par la requête
            return $this->render('searches/searchPerson.html.twig',
                [
                    'personList' => $personList,
                    'searchFormView' => $searchFormView
                ]
            );
        }
        // Si les données n'ont pas été enregistrées
        // je renvoie vers le formulaire de recherche
        return $this -> render('searches/searchPerson.html.twig',
            [
                'searchFormView' => $searchFormView
            ]
        );
    }
}