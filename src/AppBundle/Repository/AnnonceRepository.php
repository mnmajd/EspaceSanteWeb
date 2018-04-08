<?php
/**
 * Created by PhpStorm.
 * User: tarek
 * Date: 24/03/2018
 * Time: 16:43
 */

namespace AppBundle\Repository;



class AnnonceRepository extends \Doctrine\ORM\EntityRepository
{
    Public function afficherEventDQL($typeAnnonce){
        $query=$this->getEntityManager()
            ->createQuery("SELECT ann FROM AppBundle:Annonce ann WHERE ann.typeAnnonce=:p")
            ->setParameter('p',$typeAnnonce);
return $query->getResult();

    }

    Public function afficherOffreDQL($typeAnnonce){
        $query=$this->getEntityManager()
            ->createQuery("SELECT offre FROM AppBundle:Annonce offre WHERE offre.typeAnnonce=:o  AND offre.published=:published")
            ->setParameters(array('o' => $typeAnnonce,
                'published' => 1));
        return $query->getResult();

    }
    Public function afficherOffreAdminDQL($typeAnnonce){
        $query=$this->getEntityManager()
            ->createQuery("SELECT offre FROM AppBundle:Annonce offre WHERE offre.typeAnnonce=:o")
            ->setParameters(array('o' => $typeAnnonce));
        return $query->getResult();

    }
}