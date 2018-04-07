<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionRepository")
 */
class Question
{
    /**
     * @var string
     *
     * @ORM\Column(name="contenu_quest", type="text", length=65535, nullable=false)
     */
    private $contenuQuest;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Approved_Question", type="boolean", nullable=true)
     */
    private $approvedQuestion;

    /**
     * @var string
     *
     * @ORM\Column(name="Sujet_Question", type="string", length=30, nullable=false)
     */
    private $sujetQuestion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_publication", type="datetime", nullable=false)
     */
    private $datePublication = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_rep", type="integer", nullable=false)
     */
    private $nbrRep;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_question", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idQuestion;

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
     * @var string
     *
     * @ORM\Column(name="nom_catF", type="string", length=30, nullable=false)
     */
    private $nomCatf;

    /**
     * @return string
     */
    public function getContenuQuest()
    {
        return $this->contenuQuest;
    }

    /**
     * @param string $contenuQuest
     */
    public function setContenuQuest($contenuQuest)
    {
        $this->contenuQuest = $contenuQuest;
    }

    /**
     * @return bool
     */
    public function isApprovedQuestion()
    {
        return $this->approvedQuestion;
    }

    /**
     * @param bool $approvedQuestion
     */
    public function setApprovedQuestion($approvedQuestion)
    {
        $this->approvedQuestion = $approvedQuestion;
    }

    /**
     * @return string
     */
    public function getSujetQuestion()
    {
        return $this->sujetQuestion;
    }

    /**
     * @param string $sujetQuestion
     */
    public function setSujetQuestion($sujetQuestion)
    {
        $this->sujetQuestion = $sujetQuestion;
    }

    /**
     * @return \DateTime
     */
    public function getDatePublication()
    {
        return $this->datePublication;
    }

    /**
     * @param \DateTime $datePublication
     */
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;
    }

    /**
     * @return int
     */
    public function getNbrRep()
    {
        return $this->nbrRep;
    }

    /**
     * @param int $nbrRep
     */
    public function setNbrRep($nbrRep)
    {
        $this->nbrRep = $nbrRep;
    }

    /**
     * @return int
     */
    public function getIdQuestion()
    {
        return $this->idQuestion;
    }

    /**
     * @param int $idQuestion
     */
    public function setIdQuestion($idQuestion)
    {
        $this->idQuestion = $idQuestion;
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
     * @return CategorieForum
     */
    public function getNomCatf()
    {
        return $this->nomCatf;
    }

    /**
     * @param CategorieForum $nomCatf
     */
    public function setNomCatf($nomCatf)
    {
        $this->nomCatf = $nomCatf;
    }

    public function __construct()
    {
        $this->datePublication = new \DateTime();
    }




}

