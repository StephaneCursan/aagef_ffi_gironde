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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminDocumentController extends Controller
{
    /**
     * @Route("Admin/database/documents", name="documents")
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
}