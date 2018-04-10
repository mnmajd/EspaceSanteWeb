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
    public $nomCat;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_cat", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $idCat;

    /**
     * @return string
     */
    public function getNomCat()
    {
        return $this->nomCat;
    }

    /**
     * @param string $nomCat
     */
    public function setNomCat($nomCat)
    {
        $this->nomCat = $nomCat;
    }

    /**
     * @return int
     */
    public function getIdCat()
    {
        return $this->idCat;
    }

    /**
     * @param int $idCat
     */
    public function setIdCat($idCat)
    {
        $this->idCat = $idCat;
    }


}
