<?php

namespace AppBundle\Form;

use AppBundle\AppBundle;
use AppBundle\Entity\CategorieArticle;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
            ->add('titreArticle' )
            ->add('sujetArticle')
         ->add('idCat',
                EntityType::class,array(

                'class'=>'AppBundle:CategorieArticle',
                'choice_label'=>'nom_cat',
                'multiple'=>false,
                //'property' => 'nom_cat'*/


         ));

//'choices' => $categoryController->getCategories(),

       /* ->add('idCat',EntityType::class,array(
                'class'=>'AppBundle:CategorieArticle',
              'choice_name'=>'nom_cat',
            //    'query_builder' => function($repository) { return $repository->createQueryBuilder('') },
             'choice_value' => 'id_cat',
                'multiple' => false,

             //  'choice_name' => 'nom_cat'

            ))


             ->add('club',EntityType::class,array(
                'class'=>'EspritClubsBundle:Club',
                'choice_label'=>'nom',
                'multiple'=>false,
             */


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
