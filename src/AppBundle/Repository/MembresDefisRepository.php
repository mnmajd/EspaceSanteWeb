<?php

namespace AppBundle\Repository;

/**
 * MembresDefisRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MembresDefisRepository extends \Doctrine\ORM\EntityRepository
{
    public  function joinBattle()
    {
        $req = $this->getEntityManager()->createQuery(
            "select  m from EspritPArcBundle:Modele m where m.pays=:p"
        )->setParameter('p',$pays);
         $req->execute();
    }



}
