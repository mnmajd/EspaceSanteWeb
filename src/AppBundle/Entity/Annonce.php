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


}

