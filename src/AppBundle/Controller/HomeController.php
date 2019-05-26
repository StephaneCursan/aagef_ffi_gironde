<?php

namespace AppBundle\Controller;

use AppBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this -> render('home/home.html.twig',
            [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            ]
        );
    }

    /**
     * @Route("/", name="flashMessage")
     */
    public function flashMessageAction()
    {
        return $this->render('flashMessage:home/home.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
        $contactForm = $this->createForm(ContactType::class, null,
            [
                'action' => $this->generateUrl('contact'),
                'method' => 'POST'
            ]
        );

        if ($request->isMethod('POST')) {
            $contactForm->handleRequest($request);

            if ($contactForm->isSubmitted() && $contactForm->isValid()) {

                if ($this->sendEmailAction($contactForm->getData())) {
                    $this->addFlash('success', 'Merci ! Nous avons bien reçu votre message et traiterons
                                                               votre demande dans les plus brefs délais.');

                    return $this->redirectToRoute('homepage');

                } else {

                    $this->addFlash('warning', 'Une erreur empêche l\'envoi de votre message. Veuillez
                                                               vérifier vos données puis réessayez.');

                }
            }
        }

        return $this->render('home/contact.html.twig',
            [
                'contactFormView' => $contactForm->createView()
            ]
        );
    }

    private function sendEmailAction($data){
        $contactEmail = 'stephane.cursan@orange.fr';
        $contactPassword = '+p48,67F!';

        $transport = \Swift_SmtpTransport::newInstance('smtp.orange.fr', 465, 'ssl')
            ->setUsername($contactEmail)
            ->setPassword($contactPassword);

        $mailer = \Swift_Mailer::newInstance($transport);

        $message = \Swift_Message::newInstance()
            ->setSubject($data['subject'])
            ->setFrom(
                [
                    $data['email'] => $data['name']
                ]
            )
            ->setTo(
                [
                    $contactEmail => $contactEmail
                ]
            )
            ->setBody($data['message']);

            return $mailer->send($message);
    }
}