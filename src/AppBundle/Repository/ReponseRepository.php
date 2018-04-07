<?php
/**
 * Created by PhpStorm.
 * User: majd
 * Date: 07/04/18
 * Time: 11:09 ص
 */

namespace AppBundle\Repository;


class ReponseRepository extends \Doctrine\ORM\EntityRepository
{
    public function findrep($id)
    {
        $req = $this->getEntityManager()->createQuery(
            "select  m from AppBundle:Reponse m where m.idQuestion=:p"
        )->setParameter('p',$id);
        return $req->getResult();
    }
}