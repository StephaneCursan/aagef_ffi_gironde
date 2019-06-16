<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2019-05-06
 * Time: 21:21
 */

namespace AppBundle\Form;

use AppBundle\Entity\Location;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            ->add('birthDate', DateType::class,
                [
                    'widget' => 'single_text',
                    'attr' => ['class' => 'js-datepicker'],
                    'html5' => false,
                    'required' => false
                ]
            )
            ->add('birthLocation', EntityType::class,
                [
                    'class' => Location::class,
                    'choice_label' => 'city',
                    'placeholder' => 'Lieu de naissance',
                    'required' => false
                ]
            )
            ->add('deathDate', DateType::class,
                [
                    'widget' => 'single_text',
                    'attr' => ['class' => 'js-datepicker'],
                    'html5' => false,
                    'required' => false
                ]
            )
            ->add('deathLocation', EntityType::class,
                [
                    'class' => Location::class,
                    'choice_label' => 'city',
                    'placeholder' => 'Lieu de décès',
                    'required' => false
                ]
            )
            ->add('submit', SubmitType::class,
                [
                    'label' => 'Valider'
                ]
            )
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