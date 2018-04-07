<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ArticleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titreArticle')
            ->add('sujetArticle')
            ->add('contenuArticle')
            ->add('idCat',EntityType::class,array(
                'class'=>'AppBundle:CategorieArticle',
              'choice_label'=>'nom_cat',
            //    'query_builder' => function($repository) { return $repository->createQueryBuilder('') },
             //  'choice_value' => 'id_cat',
                'multiple' => false,
                'expanded' => true,
              //  'property' => 'nom_cat'

            ))

            /*
             * ->add('club',EntityType::class,array(
                'class'=>'EspritClubsBundle:Club',
                'choice_label'=>'nom',
                'multiple'=>false,
             */
            ->add('imgArtc',FileType::class,array('required'=>false));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Article'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_article';
    }


}
