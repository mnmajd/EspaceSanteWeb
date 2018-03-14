<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Service
 *
 * @ORM\Table(name="service", indexes={@ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="id_user_2", columns={"id_user"})})
 * @ORM\Entity
 */
class Service
{
    /**
     * @var string
     *
     * @ORM\Column(name="type_service", type="string", length=30, nullable=false)
     */
    private $typeService;

    /**
     * @var string
     *
     * @ORM\Column(name="heure_ouverture", type="string", length=30, nullable=false)
     */
    private $heureOuverture;

    /**
     * @var string
     *
     * @ORM\Column(name="heure_fermeture", type="string", length=30, nullable=false)
     */
    private $heureFermeture;

    /**
     * @var string
     *
     * @ORM\Column(name="promotion", type="string", length=255, nullable=false)
     */
    private $promotion;

    /**
     * @var float
     *
     * @ORM\Column(name="tarif", type="float", precision=10, scale=0, nullable=false)
     */
    private $tarif;

    /**
     * @var string
     *
     * @ORM\Column(name="e_mail", type="string", length=30, nullable=false)
     */
    private $eMail;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_etab", type="string", length=40, nullable=false)
     */
    private $adresseEtab;

    /**
     * @var integer
     *
     * @ORM\Column(name="tel_service", type="integer", nullable=false)
     */
    private $telService;

    /**
     * @var string
     *
     * @ORM\Column(name="image_serv", type="string", length=255, nullable=false)
     */
    private $imageServ;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="annee_creation", type="date", nullable=true)
     */
    private $anneeCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="langues_parlees", type="string", length=30, nullable=true)
     */
    private $languesParlees;

    /**
     * @var string
     *
     * @ORM\Column(name="modes_de_reglement", type="string", length=30, nullable=true)
     */
    private $modesDeReglement;

    /**
     * @var string
     *
     * @ORM\Column(name="assurance_maladie", type="string", length=30, nullable=true)
     */
    private $assuranceMaladie;

    /**
     * @var string
     *
     * @ORM\Column(name="activite", type="string", length=30, nullable=true)
     */
    private $activite;

    /**
     * @var string
     *
     * @ORM\Column(name="cible", type="string", length=30, nullable=true)
     */
    private $cible;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="type_pharm", type="string", length=30, nullable=true)
     */
    private $typePharm;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=30, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="specialite", type="string", length=255, nullable=true)
     */
    private $specialite;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $longitude;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_service", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idService;

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

