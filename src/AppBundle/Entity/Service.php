<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Service
 *
 * @ORM\Table(name="service", indexes={@ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="id_user_2", columns={"id_user"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ServiceRepository")
 */
class Service
{

    /**
     * @var string
     *
     * @ORM\Column(name="heure_ouverture", type="time", nullable=false)
     */
    private $heureOuverture;

    /**
     * @var string
     *
     * @ORM\Column(name="heure_fermeture", type="time", nullable=false)
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
     * @ORM\Column(name="image_serv", type="string", length=255, nullable=true)
     */
    private $imageServ;

    /**
     * @Assert\File(maxSize="6000000")
     */
private $file;


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
     * @ORM\Column(type="integer")
     */
private $nbreclamation;
    /**
     * @return string
     */
    public function getHeureOuverture()
    {
        return $this->heureOuverture;
    }

    /**
     * @param string $heureOuverture
     */
    public function setHeureOuverture($heureOuverture)
    {
        $this->heureOuverture = $heureOuverture;
    }

    /**
     * @return string
     */
    public function getHeureFermeture()
    {
        return $this->heureFermeture;
    }

    /**
     * @param string $heureFermeture
     */
    public function setHeureFermeture($heureFermeture)
    {
        $this->heureFermeture = $heureFermeture;
    }

    /**
     * @return string
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * @param string $promotion
     */
    public function setPromotion($promotion)
    {
        $this->promotion = $promotion;
    }

    /**
     * @return float
     */
    public function getTarif()
    {
        return $this->tarif;
    }

    /**
     * @param float $tarif
     */
    public function setTarif($tarif)
    {
        $this->tarif = $tarif;
    }

    /**
     * @return string
     */
    public function getEMail()
    {
        return $this->eMail;
    }

    /**
     * @param string $eMail
     */
    public function setEMail($eMail)
    {
        $this->eMail = $eMail;
    }

    /**
     * @return string
     */
    public function getAdresseEtab()
    {
        return $this->adresseEtab;
    }

    /**
     * @param string $adresseEtab
     */
    public function setAdresseEtab($adresseEtab)
    {
        $this->adresseEtab = $adresseEtab;
    }

    /**
     * @return int
     */
    public function getTelService()
    {
        return $this->telService;
    }

    /**
     * @param int $telService
     */
    public function setTelService($telService)
    {
        $this->telService = $telService;
    }


    /**
     * Get imageServ
     * @return string
     */
    public function getImageServ()
    {
        return $this->imageServ;
    }

    /**
     * Set imageServ
     * @param string $imageServ
     * @return Service
     */
    public function setImageServ($imageServ)
    {
        $this->imageServ = $imageServ;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguesParlees()
    {
        return $this->languesParlees;
    }

    /**
     * @param string $languesParlees
     */
    public function setLanguesParlees($languesParlees)
    {
        $this->languesParlees = $languesParlees;
    }

    /**
     * @return string
     */
    public function getModesDeReglement()
    {
        return $this->modesDeReglement;
    }

    /**
     * @param string $modesDeReglement
     */
    public function setModesDeReglement($modesDeReglement)
    {
        $this->modesDeReglement = $modesDeReglement;
    }



    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * @param string $specialite
     */
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return int
     */
    public function getIdService()
    {
        return $this->idService;
    }

    /**
     * @param int $idService
     */
    public function setIdService($idService)
    {
        $this->idService = $idService;
    }

    /**
     * @return User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param User $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getNbreclamation()
    {
        return $this->nbreclamation;
    }

    /**
     * @param mixed $nbreclamation
     */
    public function setNbreclamation($nbreclamation)
    {
        $this->nbreclamation = $nbreclamation;
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
public  function  getAbsolutePath(){
        return null ===$this->imageServ
            ? null
            : $this->getUploadRootDir().'/'.$this->imageServ;
}
    public function getWebPath()
    {
        return null === $this->imageServ
            ? null
            : $this->getUploadDir().'/'.$this->imageServ;
    }
    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../web/' .$this->getUploadDir();

    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
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
        $this->imageServ = $this->getFile()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }
}

