<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategorieForum
 *
 * @ORM\Table(name="categorie_forum", indexes={@ORM\Index(name="nom_catF", columns={"nom_catF"})})
 * @ORM\Entity
 */
class CategorieForum
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom_catF", type="string", length=20)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nomCatf;



    /**
     * Get nomCatf
     *
     * @return string
     */
    public function getNomCatf()
    {
        return $this->nomCatf;
    }
}
