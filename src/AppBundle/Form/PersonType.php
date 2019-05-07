<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2019-05-06
 * Time: 21:21
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;

class PersonType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName')
            ->add('firstName')
            ->add('sex', ChoiceType::class,
                [
                    'label' => 'Sexo',
                    'choices' => [
                        'Masculino' => "Masculino",
                        'Femenino' => "Femenino",
                        'Desconocido' => "Desconocido",
                    ],
                    'expanded' => true,
                    'multiple' => false,
                    'required' => true,
                ]
            )
            ->add('birthDay')
            ->add('birthMonth')
            ->add('birthYear')
            ->add('birthPlace')
            ->add('homePlace')
            ->add('unionType', ChoiceType::class,
                [
                    'choices' => [
                        'Desconocido' => "Desconocido",
                        'Soltero/a' => "Soltero/a",
                        'Casado/a' => "Casado/a",
                        'Divorciado/a' => "Divorciado/a",
                        'Viudo/a' => "Viudo/a",
                    ],
                ])
            ->add('job')
            ->add('deathDay')
            ->add('deathMonth')
            ->add('deathYear')
            ->add('deathPlace')
            ->add('submit', SubmitType::class)
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Person'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_person';
    }
}