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
            ->createQuery("SELECT ann FROM AppBundle:Annonce ann WHERE ann.typeAnnonce=:p AND ann.published=:published")
            ->setParameters(array('p' => $typeAnnonce,
                'published' => 1));
        return $query->getResult();

    }

    Public function afficherEventAdminDQL($typeAnnonce){
        $query=$this->getEntityManager()
            ->createQuery("SELECT ann FROM AppBundle:Annonce ann WHERE ann.typeAnnonce=:p ")
            ->setParameters(array('p' => $typeAnnonce));
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
    public function rechercheDQL ($motcle)
    {
        $query=$this->getEntityManager()
            ->createQuery("SELECT * FROM AppBundle:Annonce AS Offre WHERE Offre.titre_annonce like :titre")
            ->setParameters(array('titre' => $motcle ))
            ->orderBy('Offre.titre_annonce', 'ASC');
        return $query->getResult();


//        $query = $this->createQueryBuilder('u')
//            ->where('u.titreAnnonce like :titre')
//            ->setParameter('titre', $motcle)
//            ->orderBy('u.titreAnnonce', 'ASC')
//            ->getQuery();
//        return $query->getResult();
    }
}