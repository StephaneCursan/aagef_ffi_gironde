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
        $personList = $this->getDoctrine()
            ->getRepository(Person::class)
            ->findAll();

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
        $person = new Person();

        $personForm = $this->createForm(PersonType::class, $person);

        $personFormView = $personForm->createView();

        $personForm->handleRequest($request);

        if ($personForm->isSubmitted() && $personForm->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($person);
            $entityManager->flush();

            var_dump('individu enregistré'); die;
        }

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
        $request = Request::createFromGlobals();

        $personRepository = $this->getDoctrine()
            ->getRepository(Person::class);
        $person = $personRepository->find($id);

        $personForm = $this->createForm(PersonType::class, $person);

        $personFormView = $personForm->createView();

        $personForm->handleRequest($request);

        if ($personForm->isSubmitted() && $personForm->isValid()){

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($person);
            $entityManager->flush();

            var_dump("les données de l'individu ont été mises à jour"); die;
        }

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
        $personRepository = $this->getDoctrine()
            ->getRepository(Person::class);
        $person = $personRepository->find($id);

        $entityManager = $this->getDoctrine()
            ->getManager();

        $entityManager->remove($person);
        $entityManager->flush();

        var_dump("Un enregistrement a été supprimé de la table Person"); die;
    }
}