<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article", indexes={@ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="id_cat", columns={"id_cat"}), @ORM\Index(name="id_user_2", columns={"id_user", "id_cat"})})
 * @ORM\Entity
 */
class Article
{
    /**
     * @var string
     *
     * @ORM\Column(name="titre_article", type="string", length=20, nullable=false)
     */
    private $titreArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="sujet_article", type="string", length=50, nullable=false)
     */
    private $sujetArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu_article", type="text", length=65535, nullable=false)
     */
    private $contenuArticle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_pub", type="datetime", nullable=false)
     */
    private $datePub = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="img_artc", type="blob", length=65535, nullable=false)
     */
    private $imgArtc;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_cat", type="integer", nullable=false)
     */
    private $idCat;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_article", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idArticle;


}

