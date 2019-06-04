<?php

namespace AppBundle\Controller;

use AppBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends Controller
{
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

            if ($contactForm->isSubmitted() && $contactForm->isValid())
            {
                if ($this->sendEmailAction($contactForm->getData()))
                {
                    $this->addFlash('success', 'Votre message a été envoyé avec succès. Nous le traiterons
                                                               dans les plus brefs délais.');

                    return $this->redirectToRoute('contact');

                } else {

                    $this->addFlash('warning', 'Une erreur a empêché l\'envoi du message. Veuillez
                                                               essayer à nouveau.');

                }
            }
        }

        return $this->render('pages/contact.html.twig',
            [
                'contactFormView' => $contactForm->createView()
            ]
        );
    }

    private function sendEmailAction($data)
    {
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