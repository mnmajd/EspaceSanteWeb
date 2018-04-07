<?php
/**
 * Created by PhpStorm.
 * User: majd
 * Date: 05/04/18
 * Time: 01:47 م
 */

namespace AppBundle\Repository;


class QuestionRepository extends \Doctrine\ORM\EntityRepository
{


public function catquestion($cat)
{
    $req = $this->getEntityManager()->createQuery(
        "select  m from AppBundle:Question m where m.nomCatf=:p"
    )->setParameter('p',$cat);
    return $req->getResult();
}

    public function SetRepNbr($id)
    {
        {$req = $this->getEntityManager()->createQuery(

            "update AppBundle:Question m set m.nbrRep=(select COUNT(s) from AppBundle:Reponse s
          where s.idQuestion=:p) WHERE m.idQuestion=:p")
            ->setParameter('p', $id);
        }
        return $req->execute();


    }





}
