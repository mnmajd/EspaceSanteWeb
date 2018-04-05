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
}