<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2019-05-09
 * Time: 18:11
 */

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Document;
use AppBundle\Form\DocumentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminDocumentController extends Controller
{
    /**
     * @Route("Admin/database/documents", name="documents")
     */
    public function documentListAction()
    {
        $documentList = $this->getDoctrine()
            ->getRepository(Document::class)
            ->findAll();

        return $this->render('Admin/listDocument.html.twig',
            [
                'documentList' => $documentList
            ]
        );
    }

    /**
     * @Route("/database/documentSingle/{id}", name="documentSingle")
     */
    public function documentSingleAction($id)
    {
        $documentRepository = $this->getDoctrine()
            ->getRepository(Document::class);
        $documentSingle = $documentRepository->find($id);

        return $this->render('Admin//singleDocument.html.twig',
            [
                'documentSingle' => $documentSingle
            ]
        );
    }

    /**
     * @Route("Admin/database/document_create", name="document_create")
     */
    public function DocumentCreateAction(Request $request)
    {
        $document = new Document();

        $documentForm = $this->createForm(DocumentType::class, $document);

        $documentFormView = $documentForm->createView();

        $documentForm->handleRequest($request);

        if ($documentForm->isSubmitted() && $documentForm->isValid()){

            $file = $document->getPhoto();

            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            try {
                $file->move(
                  $this->getParameter('upload_files_document'),
                  $fileName
                );
            } catch (FileException $e){
                throw new \Exception($e->getMessage());
            }

            $document->setPhoto($fileName);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($document);
            $entityManager->flush();

            var_dump('document enregistré'); die;
        }

        return $this->render('Admin/createDocument.html.twig',
            [
                'documentFormView' => $documentFormView
            ]
        );
    }

    /**
     * @Route("Admin/database/document_update/{id}", name="document_update")
     */
    public function personUpdateAction($id)
    {
        $request = Request::createFromGlobals();

        $documentRepository = $this->getDoctrine()->getRepository(Document::class);
        $document = $documentRepository->find($id);

        $oldFile = new File($this->getParameter('upload_files_document').$document->getPhoto());
        $document->setPhoto($oldFile);

        $documentForm = $this->createForm(DocumentType::class, $document);

        $documentFormView = $documentForm->createView();

        $documentForm->handleRequest($request);

        if ($documentForm->isSubmitted() && $documentForm->isValid()){

            $file = $document->getPhoto();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            try {
                $file->move(
                    $this->getParameter('upload_files_document'),
                    $fileName
                );
            } catch (FileException $e){
                throw new \Exception($e->getMessage());
            }

            $document->setPhoto($fileName);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($document);
            $entityManager->flush();

            var_dump("les données du document ont été mises à jour"); die;
        }

        return $this->render('Admin/updateDocument.html.twig',
            [
                'documentFormView' => $documentFormView
            ]
        );
    }

    /**
     * @Route("Admin/database/document_delete/{id}", name="document_delete")
     */
    public function documentDeleteAction($id)
    {
        $documentRepository = $this->getDoctrine()
            ->getRepository(Document::class);
        $document = $documentRepository->find($id);

        $entityManager = $this->getDoctrine()
            ->getManager();

        $entityManager->remove($document);
        $entityManager->flush();

        var_dump("Un enregistrement de la table Document a été supprimé"); die;
    }
}