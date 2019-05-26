<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,
                [
                    'attr' =>
                        [
                            'placeholder' => 'Votre nom'
                        ],
                    'constraints' =>
                        [
                            new NotBlank(
                                [
                                    "message" => "Veuillez saisir votre nom"
                                ]
                            )
                        ]
                ]
            )
            ->add('subject', TextType::class,
                [
                    'attr' =>
                        [
                            'placeholder' => 'Objet du message'
                        ],
                    'constraints' =>
                        [
                            new NotBlank(
                                [
                                    "message" => "Veuillez saisir l'objet du message"
                                ]
                            )
                        ]
                ]
            )
            ->add('email', EmailType::class,
                [
                    'attr' =>
                        [
                            'placeholder' => 'Votre adresse électronique'
                        ],
                    'constraints' =>
                        [
                            new NotBlank(
                                [
                                    "message" => "Veuillez saisir votre adresse électronique"
                                ]
                            ),
                            new Email(
                                [
                                    "message" => "L'adresse électronique ne semble pas valide"
                                ]
                            )
                        ]

                ]
            )
            ->add('message', TextareaType::class,
                [
                    'attr' =>
                        [
                            'placeholder' => 'Votre message'
                        ],
                    'constraints' =>
                        [
                            new NotBlank(
                                [
                                    "message" => "Veuillez saisir votre message"
                                ]
                            )
                        ]
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'error-bubling' => true
            ]
        );
    }

    public function getName()
    {
        return 'contactForm';
    }
}