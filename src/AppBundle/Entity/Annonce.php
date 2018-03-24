<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\user;
/**
 * Annonce
 *
 * @ORM\Table(name="annonce", indexes={@ORM\Index(name="id_user", columns={"id_user"})})
 * @ORM\Entity
 */
class Annonce
{
    /**
     * @var string
     *
     * @ORM\Column(name="type_annonce", type="string", length=30, nullable=false)
     */
    private $typeAnnonce;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_annonce", type="string", length=30, nullable=false)
     */
    private $titreAnnonce;

    /**
     * @var string
     *
     * @ORM\Column(name="desc_annonce", type="text", length=65535, nullable=false)
     */
    private $descAnnonce;

    /**
     * @var string
     *
     * @ORM\Column(name="date_annonce", type="string", length=30, nullable=false)
     */
    private $dateAnnonce;

    /**
     * @var string
     *
     * @ORM\Column(name="addr_annonce", type="string", length=40, nullable=false)
     */
    private $addrAnnonce;

    /**
     * @var integer
     *
     * @ORM\Column(name="tel_annonce", type="integer", nullable=false)
     */
    private $telAnnonce;

    /**
     * @var string
     *
     * @ORM\Column(name="img_annonce", type="string", length=255, nullable=false)
     */
    private $imgAnnonce;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_annonce", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAnnonce;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;

    /**
     * @return string
     */
    public function getTypeAnnonce()
    {
        return $this->typeAnnonce;
    }

    /**
     * @param string $typeAnnonce
     */
    public function setTypeAnnonce($typeAnnonce)
    {
        $this->typeAnnonce = $typeAnnonce;
    }

    /**
     * @return string
     */
    public function getTitreAnnonce()
    {
        return $this->titreAnnonce;
    }

    /**
     * @param string $titreAnnonce
     */
    public function setTitreAnnonce($titreAnnonce)
    {
        $this->titreAnnonce = $titreAnnonce;
    }

    /**
     * @return string
     */
    public function getDescAnnonce()
    {
        return $this->descAnnonce;
    }

    /**
     * @param string $descAnnonce
     */
    public function setDescAnnonce($descAnnonce)
    {
        $this->descAnnonce = $descAnnonce;
    }

    /**
     * @return string
     */
    public function getDateAnnonce()
    {
        return $this->dateAnnonce;
    }

    /**
     * @param string $dateAnnonce
     */
    public function setDateAnnonce($dateAnnonce)
    {
        $this->dateAnnonce = $dateAnnonce;
    }

    /**
     * @return string
     */
    public function getAddrAnnonce()
    {
        return $this->addrAnnonce;
    }

    /**
     * @param string $addrAnnonce
     */
    public function setAddrAnnonce($addrAnnonce)
    {
        $this->addrAnnonce = $addrAnnonce;
    }

    /**
     * @return int
     */
    public function getTelAnnonce()
    {
        return $this->telAnnonce;
    }

    /**
     * @param int $telAnnonce
     */
    public function setTelAnnonce($telAnnonce)
    {
        $this->telAnnonce = $telAnnonce;
    }

    /**
     * @return string
     */
    public function getImgAnnonce()
    {
        return $this->imgAnnonce;
    }

    /**
     * @param string $imgAnnonce
     */
    public function setImgAnnonce($imgAnnonce)
    {
        $this->imgAnnonce = $imgAnnonce;
    }

    /**
     * @return int
     */
    public function getIdAnnonce()
    {
        return $this->idAnnonce;
    }

    /**
     * @param int $idAnnonce
     */
    public function setIdAnnonce($idAnnonce)
    {
        $this->idAnnonce = $idAnnonce;
    }

    /**
     * @return \AppBundle\Entity\User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param \AppBundle\Entity\User $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }


}

