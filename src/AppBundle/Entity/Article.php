<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;




/*
* @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BlogRepository")
 * @ORM\HasLifecycleCallbacks()
 */


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
     * @ORM\Column(name="img_artc", type="string", length=255, nullable=true)
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    public $imgArtc;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */


    public $idUser ;

    /**
     *
     * @var \AppBundle\Entity\Service
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CategorieArticle",cascade={"remove"})
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_cat",referencedColumnName="id_cat",onDelete="cascade")
     * })

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
      * @Assert\File(maxSize="6000000")
      */
     private $file;


     /**
      * @var integer
      *
      * @ORM\Column(name="visibilite", type="integer", nullable=false )
      */
     public $visibilite ;

     /**
      * @return int
      */
     public function getVisibilite()
     {
         return $this->visibilite;
     }

     /**
      * @param int $visibilite
      */
     public function setVisibilite($visibilite)
     {
         $this->visibilite = $visibilite;
     }


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
      * return Article
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
      * @return mixed
      */
     public function getFile()
     {
         return $this->file;
     }

     /**
      * @param mixed $file
      */
     public function setFile($file)
     {
         $this->file = $file;
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
//imaaaage

     public  function  getAbsolutePath(){
         return null ===$this->imgArtc
             ? null
             : $this->getUploadRootDir().'/'.$this->imgArtc;
     }
     public function getWebPath()
     {
         return null === $this->imgArtc
             ? null
             : $this->getUploadDir().'/'.$this->imgArtc;
     }
     protected function getUploadRootDir()
     {
         // the absolute directory path where uploaded
         // documents should be saved
         return __DIR__.'/../../../web/' .$this->getUploadDir();

     }

     protected function getUploadDir()
     {
         // get rid of the DIR so it doesn't screw up
         // when displaying uploaded doc/image in the view.
         return 'images';
     }

     public function upload()
     {
         // the file property can be empty if the field is not required
         if (null === $this->getFile()) {
             return;
         }

         // use the original file name here but you should
         // sanitize it at least to avoid any security issues

         // move takes the target directory and then the
         // target filename to move to
         $this->getFile()->move(
             $this->getUploadRootDir(),
             $this->getFile()->getClientOriginalName()
         );

         // set the path property to the filename where you've saved the file
         $this->imgArtc = $this->getFile()->getClientOriginalName();

         // clean up the file property as you won't need it anymore
         $this->file = null;
     }



    /**
     * Set sujetArticle
     *
     * @param string $sujetArticle
     *
     * @return Article
     */
    public function setSujetArticle($sujetArticle)
    {
        $this->sujetArticle = $sujetArticle;

        return $this;
    }

    /**
     * Get sujetArticle
     *
     * @return string
     */
    public function getSujetArticle()
    {
        return $this->sujetArticle;
    }
}
