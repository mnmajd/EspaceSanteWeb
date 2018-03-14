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


}

