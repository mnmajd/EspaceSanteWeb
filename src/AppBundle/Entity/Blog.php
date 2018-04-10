<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Blog
 *
 * @ORM\Table(name="blog")
 * @ORM\Entity
 */
class Blog
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cat", type="integer", nullable=true)
     */
    private $idCat;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_article", type="integer", nullable=true)
     */
    private $idArticle;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_like", type="integer", nullable=true)
     */
    private $nbrLike;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_blog", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBlog;



    /**
     * Set idCat
     *
     * @param integer $idCat
     *
     * @return Blog
     */
    public function setIdCat($idCat)
    {
        $this->idCat = $idCat;

        return $this;
    }

    /**
     * Get idCat
     *
     * @return integer
     */
    public function getIdCat()
    {
        return $this->idCat;
    }

    /**
     * Set idArticle
     *
     * @param integer $idArticle
     *
     * @return Blog
     */
    public function setIdArticle($idArticle)
    {
        $this->idArticle = $idArticle;

        return $this;
    }

    /**
     * Get idArticle
     *
     * @return integer
     */
    public function getIdArticle()
    {
        return $this->idArticle;
    }

    /**
     * Set nbrLike
     *
     * @param integer $nbrLike
     *
     * @return Blog
     */
    public function setNbrLike($nbrLike)
    {
        $this->nbrLike = $nbrLike;

        return $this;
    }

    /**
     * Get nbrLike
     *
     * @return integer
     */
    public function getNbrLike()
    {
        return $this->nbrLike;
    }

    /**
     * Get idBlog
     *
     * @return integer
     */
    public function getIdBlog()
    {
        return $this->idBlog;
    }
}
