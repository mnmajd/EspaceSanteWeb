<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * Set typeAnnonce
     *
     * @param string $typeAnnonce
     *
     * @return Annonce
     */
    public function setTypeAnnonce($typeAnnonce)
    {
        $this->typeAnnonce = $typeAnnonce;

        return $this;
    }

    /**
     * Get typeAnnonce
     *
     * @return string
     */
    public function getTypeAnnonce()
    {
        return $this->typeAnnonce;
    }

    /**
     * Set titreAnnonce
     *
     * @param string $titreAnnonce
     *
     * @return Annonce
     */
    public function setTitreAnnonce($titreAnnonce)
    {
        $this->titreAnnonce = $titreAnnonce;

        return $this;
    }

    /**
     * Get titreAnnonce
     *
     * @return string
     */
    public function getTitreAnnonce()
    {
        return $this->titreAnnonce;
    }

    /**
     * Set descAnnonce
     *
     * @param string $descAnnonce
     *
     * @return Annonce
     */
    public function setDescAnnonce($descAnnonce)
    {
        $this->descAnnonce = $descAnnonce;

        return $this;
    }

    /**
     * Get descAnnonce
     *
     * @return string
     */
    public function getDescAnnonce()
    {
        return $this->descAnnonce;
    }

    /**
     * Set dateAnnonce
     *
     * @param string $dateAnnonce
     *
     * @return Annonce
     */
    public function setDateAnnonce($dateAnnonce)
    {
        $this->dateAnnonce = $dateAnnonce;

        return $this;
    }

    /**
     * Get dateAnnonce
     *
     * @return string
     */
    public function getDateAnnonce()
    {
        return $this->dateAnnonce;
    }

    /**
     * Set addrAnnonce
     *
     * @param string $addrAnnonce
     *
     * @return Annonce
     */
    public function setAddrAnnonce($addrAnnonce)
    {
        $this->addrAnnonce = $addrAnnonce;

        return $this;
    }

    /**
     * Get addrAnnonce
     *
     * @return string
     */
    public function getAddrAnnonce()
    {
        return $this->addrAnnonce;
    }

    /**
     * Set telAnnonce
     *
     * @param integer $telAnnonce
     *
     * @return Annonce
     */
    public function setTelAnnonce($telAnnonce)
    {
        $this->telAnnonce = $telAnnonce;

        return $this;
    }

    /**
     * Get telAnnonce
     *
     * @return integer
     */
    public function getTelAnnonce()
    {
        return $this->telAnnonce;
    }

    /**
     * Set imgAnnonce
     *
     * @param string $imgAnnonce
     *
     * @return Annonce
     */
    public function setImgAnnonce($imgAnnonce)
    {
        $this->imgAnnonce = $imgAnnonce;

        return $this;
    }

    /**
     * Get imgAnnonce
     *
     * @return string
     */
    public function getImgAnnonce()
    {
        return $this->imgAnnonce;
    }

    /**
     * Get idAnnonce
     *
     * @return integer
     */
    public function getIdAnnonce()
    {
        return $this->idAnnonce;
    }

    /**
     * Set idUser
     *
     * @param \AppBundle\Entity\User $idUser
     *
     * @return Annonce
     */
    public function setIdUser(\AppBundle\Entity\User $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \AppBundle\Entity\User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}
