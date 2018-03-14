<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategorieArticle
 *
 * @ORM\Table(name="categorie_article")
 * @ORM\Entity
 */
class CategorieArticle
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom_cat", type="string", length=20, nullable=false)
     */
    private $nomCat;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_cat", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCat;


}

