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
    public $titreArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="sujet_article", type="string", length=50, nullable=false)
     */
    public $sujetArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu_article", type="text", length=65535, nullable=false)
     */
    public $contenuArticle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_pub", type="datetime", nullable=false)
     */
    public $datePub = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="img_artc", type="blob", length=65535, nullable=false)
     */
    public $imgArtc;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    public $idUser ;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_cat", type="integer", nullable=false )
     */
    public $idCat ;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_article", type="integer" )
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $idArticle;

     /**
      * @return string
      */
     public function getTitreArticle()
     {
         return $this->titreArticle;
     }

     /**
      * @param string $titreArticle
      */
     public function setTitreArticle($titreArticle)
     {
         $this->titreArticle = $titreArticle;
     }

     /**
      * @return string
      */
     public function getContenuArticle()
     {
         return $this->contenuArticle;
     }

     /**
      * @param string $contenuArticle
      */
     public function setContenuArticle($contenuArticle)
     {
         $this->contenuArticle = $contenuArticle;
     }

     /**
      * @return \DateTime
      */
     public function getDatePub()
     {
         return $this->datePub;
     }

     /**
      * @param \DateTime $datePub
      */
     public function setDatePub($datePub)
     {
         $this->datePub = $datePub;
     }

     /**
      * @return string
      */
     public function getImgArtc()
     {
         return $this->imgArtc;
     }

     /**
      * @param string $imgArtc
      */
     public function setImgArtc($imgArtc)
     {
         $this->imgArtc = $imgArtc;
     }

     /**
      * @return int
      */
     public function getIdUser()
     {
         return $this->idUser;
     }

     /**
      * @param int $idUser
      */
     public function setIdUser($idUser)
     {
         $this->idUser = $idUser;
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

     /**
      * @return int
      */
     public function getIdArticle()
     {
         return $this->idArticle;
     }

     /**
      * @param int $idArticle
      */
     public function setIdArticle($idArticle)
     {
         $this->idArticle = $idArticle;
     }

     public function onPrePersist()
     {
         $this->datePub = new \DateTime("now");
     }



}

