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

    public function like($id)
    {
        $req = $this->getEntityManager()->createQuery(

            "update AppBundle:Reponse m set m.nbrAimeRep = m.nbrAimeRep + 1  where m.idRep=:p")
            ->setParameter('p', $id);
        return $req->execute();
    }
    public function dislike($id)
    {
        $req = $this->getEntityManager()->createQuery(

            "update AppBundle:Reponse m set m.nbrAimeRep = m.nbrAimeRep - 1 where m.idRep=:p ")
            ->setParameter('p', $id);
        return $req->execute();
    }
    public function likedrepuser($id)
    {
        $req = $this->getEntityManager()->createQuery(
            "select m.idLikedReponse from AppBundle:LikedQuestion m where m.idUser=:p"
        )->setParameter('p',$id);
        return $req->getResult();

    }

}