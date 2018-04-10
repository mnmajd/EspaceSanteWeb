<?php
/**
 * Created by PhpStorm.
 * User: TAQWA
 * Date: 09/04/2018
 * Time: 21:00
 */

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Article;
use Doctrine\ORM\QueryBuilder;
class BlogRepository extends EntityRepository
{
    public function findArticleByTitre($titre)
    {

        $req = $this->getEntityManager()->createQuery(
        //'select * from article where titre_article like :titre'
            "select  m from AppBundle:Article m where m.titre_article LIKE :titre"
        )->setParameter('titre', $titre);
        return $req->getResult();
    }


    public function findAllArticleByVisib()
    {
              return $this->getEntityManager()->createQuery(
        //'select * from article where titre_article like :titre'
            "select r from AppBundle:Article r WHERE r.visibilite = 1 ")->getResult();
    }

}