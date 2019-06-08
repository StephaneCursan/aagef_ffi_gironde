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
     * @Route("Admin/database/persons", name="persons")
     */
    public function personListAction()
    {
        $breadcrumbs = $this->get('white_october_breadcrumbs');
        $breadcrumbs->addRouteItem('Gestion des individus', 'persons');
        $breadcrumbs->prependRouteItem('Interface d\'administration', 'adminHome');
        // je récupère une instance de Doctrine
        $personList = $this->getDoctrine()
            // je récupère le repository de l'entité Person
            // qui me permet d'effectuer des requêtes dans la BDD
            ->getRepository(Person::class)
            // j'utilise la méthode findAll du repository afin
            // de récupérer tous les enregistrements de la table Person
            ->findAll();
        // l'affichage des résultats se fait dans une vue via un fichier twig
        return $this->render('admin/listPerson.html.twig',
            [
                'personList' => $personList
            ]
        );
    }

    /**
     * @Route("Admin/database/person_create", name="person_create")
     */
    public function personCreateAction(Request $request)
    {
        $breadcrumbs = $this->get('white_october_breadcrumbs');
        $breadcrumbs->addRouteItem('Créer un individu', 'person_create');
        $breadcrumbs->prependRouteItem('Gestion des individus', 'persons');
        $breadcrumbs->prependRouteItem('Interface d\'administration', 'adminHome');
        // je crée une nouvelle instance de l'entité Person
        $person = new Person();
        // création du gabarit du formulaire
        $personForm = $this->createForm(PersonType::class, $person);
        // utilisation du gabarit pour créer une vue du formulaire
        // destinée à être envoyée dans un fichier twig
        $personFormView = $personForm->createView();
        // je récupère la variable $request qui contient les données de la requête,
        // et notamment celles de la superglobale $_POST
        $personForm->handleRequest($request);
        // je récupère la variable $searchForm qui contient désormais le formulaire
        // avec les données de la requête, et je vérifie qu'elles ont été correctement
        // envoyées et qu'elles sont valides
        if ($personForm->isSubmitted() && $personForm->isValid())
        {
            // je récupère l'entityManager
            $entityManager = $this->getDoctrine()->getManager();
            // j'insère la Person dans l'unité de travail
            $entityManager->persist($person);
            // je pousse les données de l'Unité de travail dans la BDD
            $entityManager->flush();
            // affichage d'un message avertissant du bon déroulé de l'enregistrement
            $this->addFlash('success', 'Le nouvel individu a bien été enregistré');
            // je réinitialise le formulaire d'enregistrement
            return $this->redirectToRoute('person_create');
        }
        // Si les données n'ont pas été enregistrées
        // je renvoie vers le formulaire d'enregistrement
        return $this->render('admin/createPerson.html.twig',
            [
                'personFormView' => $personFormView
            ]
        );
    }

    /**
     * @Route("Admin/database/person_update/{id}", name="person_update")
     */
    public function personUpdateAction($id)
    {
        // je stocke dans la variable $request les variables superglobales grâce à
        // la méthode statique createFromGlobals de la classe Request
        $request = Request::createFromGlobals();
        // je récupère une instance de Doctrine
        $personRepository = $this->getDoctrine()
            // je récupère le repository de l'entité Person
            // qui me permet d'effectuer des requêtes dans la BDD
            ->getRepository(Person::class);
        // j'utilise une méthode définie dans le repository de l'entité Person
        // pour récupérer les données de l'élément dans la table Person correspondant
        // a l'id de l'individu sélectionné
        $person = $personRepository->find($id);
        // création du gabarit du formulaire
        $personForm = $this->createForm(PersonType::class, $person);
        // utilisation du gabarit pour créer une vue du formulaire
        // destinée à être envoyée dans un fichier twig
        $personFormView = $personForm->createView();
        // je récupère la variable $request qui contient les données de la requête,
        // et notamment celles de la superglobale $_POST
        $personForm->handleRequest($request);
        // je récupère la variable $searchForm qui contient désormais le formulaire
        // avec les données de la requête, et je vérifie qu'elles ont été correctement
        // envoyées et qu'elles sont valides
        if ($personForm->isSubmitted() && $personForm->isValid()){
            // je récupère l'entityManager
            $entityManager = $this->getDoctrine()->getManager();
            // j'insère la Person dans l'unité de travail
            $entityManager->persist($person);
            // je pousse les données de l'Unité de travail dans la BDD
            $entityManager->flush();
            // affichage d'un message avertissant du bon déroulé de l'enregistrement
            $this->addFlash('success', 'L\'enregistrement a été correctement mis à jour');
            // je renvoie vers la liste de tous les individus
            return $this->redirectToRoute('persons');
        }
        // Si les données n'ont pas été enregistrées
        // je renvoie vers le formulaire d'enregistrement
        return $this->render('admin/updatePerson.html.twig',
            [
                'personFormView' => $personFormView
            ]
        );
    }

    /**
     * @Route("Admin/database/person_delete/{id}", name="person_delete")
     */
    public function personDeleteAction($id)
    {
        // je récupère une instance de Doctrine
        $personRepository = $this->getDoctrine()
            // je récupère le repository de l'entité Person
            // qui me permet d'effectuer des requêtes dans la BDD
            ->getRepository(Person::class);
        // j'utilise la méthode find du repository pour récupérer les
        // données de l'élément dans la table Person correspondant à
        // l'id de l'individu sélectionné
        $person = $personRepository->find($id);
        // je récupère l'entityManager
        $entityManager = $this->getDoctrine()
            ->getManager();
        // je spécifie l'intention de supprimer l'élément
        // en l'insérant dans l'unité de travail
        $entityManager->remove($person);
        // j'exécute la requête
        $entityManager->flush();
        // affichage d'un message avertissant du bon déroulé de l'enregistrement
        $this->addFlash('success', 'La suppression de l\'enregistrement s\'est correctement déroulée');
        // je renvoie vers la liste de tous les individus
        return $this->redirectToRoute('persons');
    }
}