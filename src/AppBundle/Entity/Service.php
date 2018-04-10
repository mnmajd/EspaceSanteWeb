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



    /**
     * Set typeService
     *
     * @param string $typeService
     *
     * @return Service
     */
    public function setTypeService($typeService)
    {
        $this->typeService = $typeService;

        return $this;
    }

    /**
     * Get typeService
     *
     * @return string
     */
    public function getTypeService()
    {
        return $this->typeService;
    }

    /**
     * Set heureOuverture
     *
     * @param string $heureOuverture
     *
     * @return Service
     */
    public function setHeureOuverture($heureOuverture)
    {
        $this->heureOuverture = $heureOuverture;

        return $this;
    }

    /**
     * Get heureOuverture
     *
     * @return string
     */
    public function getHeureOuverture()
    {
        return $this->heureOuverture;
    }

    /**
     * Set heureFermeture
     *
     * @param string $heureFermeture
     *
     * @return Service
     */
    public function setHeureFermeture($heureFermeture)
    {
        $this->heureFermeture = $heureFermeture;

        return $this;
    }

    /**
     * Get heureFermeture
     *
     * @return string
     */
    public function getHeureFermeture()
    {
        return $this->heureFermeture;
    }

    /**
     * Set promotion
     *
     * @param string $promotion
     *
     * @return Service
     */
    public function setPromotion($promotion)
    {
        $this->promotion = $promotion;

        return $this;
    }

    /**
     * Get promotion
     *
     * @return string
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * Set tarif
     *
     * @param float $tarif
     *
     * @return Service
     */
    public function setTarif($tarif)
    {
        $this->tarif = $tarif;

        return $this;
    }

    /**
     * Get tarif
     *
     * @return float
     */
    public function getTarif()
    {
        return $this->tarif;
    }

    /**
     * Set eMail
     *
     * @param string $eMail
     *
     * @return Service
     */
    public function setEMail($eMail)
    {
        $this->eMail = $eMail;

        return $this;
    }

    /**
     * Get eMail
     *
     * @return string
     */
    public function getEMail()
    {
        return $this->eMail;
    }

    /**
     * Set adresseEtab
     *
     * @param string $adresseEtab
     *
     * @return Service
     */
    public function setAdresseEtab($adresseEtab)
    {
        $this->adresseEtab = $adresseEtab;

        return $this;
    }

    /**
     * Get adresseEtab
     *
     * @return string
     */
    public function getAdresseEtab()
    {
        return $this->adresseEtab;
    }

    /**
     * Set telService
     *
     * @param integer $telService
     *
     * @return Service
     */
    public function setTelService($telService)
    {
        $this->telService = $telService;

        return $this;
    }

    /**
     * Get telService
     *
     * @return integer
     */
    public function getTelService()
    {
        return $this->telService;
    }

    /**
     * Set imageServ
     *
     * @param string $imageServ
     *
     * @return Service
     */
    public function setImageServ($imageServ)
    {
        $this->imageServ = $imageServ;

        return $this;
    }

    /**
     * Get imageServ
     *
     * @return string
     */
    public function getImageServ()
    {
        return $this->imageServ;
    }

    /**
     * Set anneeCreation
     *
     * @param \DateTime $anneeCreation
     *
     * @return Service
     */
    public function setAnneeCreation($anneeCreation)
    {
        $this->anneeCreation = $anneeCreation;

        return $this;
    }

    /**
     * Get anneeCreation
     *
     * @return \DateTime
     */
    public function getAnneeCreation()
    {
        return $this->anneeCreation;
    }

    /**
     * Set languesParlees
     *
     * @param string $languesParlees
     *
     * @return Service
     */
    public function setLanguesParlees($languesParlees)
    {
        $this->languesParlees = $languesParlees;

        return $this;
    }

    /**
     * Get languesParlees
     *
     * @return string
     */
    public function getLanguesParlees()
    {
        return $this->languesParlees;
    }

    /**
     * Set modesDeReglement
     *
     * @param string $modesDeReglement
     *
     * @return Service
     */
    public function setModesDeReglement($modesDeReglement)
    {
        $this->modesDeReglement = $modesDeReglement;

        return $this;
    }

    /**
     * Get modesDeReglement
     *
     * @return string
     */
    public function getModesDeReglement()
    {
        return $this->modesDeReglement;
    }

    /**
     * Set assuranceMaladie
     *
     * @param string $assuranceMaladie
     *
     * @return Service
     */
    public function setAssuranceMaladie($assuranceMaladie)
    {
        $this->assuranceMaladie = $assuranceMaladie;

        return $this;
    }

    /**
     * Get assuranceMaladie
     *
     * @return string
     */
    public function getAssuranceMaladie()
    {
        return $this->assuranceMaladie;
    }

    /**
     * Set activite
     *
     * @param string $activite
     *
     * @return Service
     */
    public function setActivite($activite)
    {
        $this->activite = $activite;

        return $this;
    }

    /**
     * Get activite
     *
     * @return string
     */
    public function getActivite()
    {
        return $this->activite;
    }

    /**
     * Set cible
     *
     * @param string $cible
     *
     * @return Service
     */
    public function setCible($cible)
    {
        $this->cible = $cible;

        return $this;
    }

    /**
     * Get cible
     *
     * @return string
     */
    public function getCible()
    {
        return $this->cible;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Service
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set typePharm
     *
     * @param string $typePharm
     *
     * @return Service
     */
    public function setTypePharm($typePharm)
    {
        $this->typePharm = $typePharm;

        return $this;
    }

    /**
     * Get typePharm
     *
     * @return string
     */
    public function getTypePharm()
    {
        return $this->typePharm;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Service
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Service
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set specialite
     *
     * @param string $specialite
     *
     * @return Service
     */
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * Get specialite
     *
     * @return string
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Service
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Service
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Get idService
     *
     * @return integer
     */
    public function getIdService()
    {
        return $this->idService;
    }

    /**
     * Set idUser
     *
     * @param \AppBundle\Entity\User $idUser
     *
     * @return Service
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
