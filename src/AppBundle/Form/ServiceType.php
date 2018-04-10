<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
class ServiceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('specialite', ChoiceType::class, array(
            'choices'  => array(
                "Dentiste"=>'Dentiste',
                'Cardiology' => 'Cardiology',
                'Ophthalmology' => 'Ophthalmology',
                "Neurology"=>'Neurology',
                'Dermatology' => 'Dermatology',
                'Psychology' => 'Psychology',



            )))

            ->add('nom',TextareaType::class)

            ->add('prenom',TextareaType::class)

            ->add('eMail',EmailType:: class)
            ->add('adresseEtab')
            ->add('promotion',TextareaType::class ,array('label' => false,'attr' => array('rows' => '5','placeholder' => 'Description' ,'cols' => '75','id' => 'des' )))

            ->add('telService',NumberType::class)
            ->add('heureOuverture',TimeType::class)
            ->add('heureFermeture',TimeType::class)

            ->add('modesDeReglement',ChoiceType::class,array(
                'choices'=>array('Espéce'=>'Espéce','Chéque'=>'Chéque'),
                'expanded'=>true,
                'multiple'=>false,
            ))
            ->add('languesParlees',ChoiceType::class,array(
                'choices'=>array('Anglais'=>'Anglais','Francais'=>'Francais'),
                'expanded'=>true,
                'multiple'=>false,
            ))
            ->add('tarif')
            ->add('file');
    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Service'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_service';
    }


}
