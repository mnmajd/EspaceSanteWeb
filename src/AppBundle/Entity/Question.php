<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question", indexes={@ORM\Index(name="id_catF", columns={"id_user"}), @ORM\Index(name="nom_catF", columns={"nom_catF"})})
 * @ORM\Entity
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
     * @ORM\Column(name="Approved_Question", type="boolean", nullable=false)
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
     * @var \AppBundle\Entity\CategorieForum
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CategorieForum")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nom_catF", referencedColumnName="nom_catF")
     * })
     */
    private $nomCatf;



    /**
     * Set contenuQuest
     *
     * @param string $contenuQuest
     *
     * @return Question
     */
    public function setContenuQuest($contenuQuest)
    {
        $this->contenuQuest = $contenuQuest;

        return $this;
    }

    /**
     * Get contenuQuest
     *
     * @return string
     */
    public function getContenuQuest()
    {
        return $this->contenuQuest;
    }

    /**
     * Set approvedQuestion
     *
     * @param boolean $approvedQuestion
     *
     * @return Question
     */
    public function setApprovedQuestion($approvedQuestion)
    {
        $this->approvedQuestion = $approvedQuestion;

        return $this;
    }

    /**
     * Get approvedQuestion
     *
     * @return boolean
     */
    public function getApprovedQuestion()
    {
        return $this->approvedQuestion;
    }

    /**
     * Set sujetQuestion
     *
     * @param string $sujetQuestion
     *
     * @return Question
     */
    public function setSujetQuestion($sujetQuestion)
    {
        $this->sujetQuestion = $sujetQuestion;

        return $this;
    }

    /**
     * Get sujetQuestion
     *
     * @return string
     */
    public function getSujetQuestion()
    {
        return $this->sujetQuestion;
    }

    /**
     * Set datePublication
     *
     * @param \DateTime $datePublication
     *
     * @return Question
     */
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    /**
     * Get datePublication
     *
     * @return \DateTime
     */
    public function getDatePublication()
    {
        return $this->datePublication;
    }

    /**
     * Set nbrRep
     *
     * @param integer $nbrRep
     *
     * @return Question
     */
    public function setNbrRep($nbrRep)
    {
        $this->nbrRep = $nbrRep;

        return $this;
    }

    /**
     * Get nbrRep
     *
     * @return integer
     */
    public function getNbrRep()
    {
        return $this->nbrRep;
    }

    /**
     * Get idQuestion
     *
     * @return integer
     */
    public function getIdQuestion()
    {
        return $this->idQuestion;
    }

    /**
     * Set idUser
     *
     * @param \AppBundle\Entity\User $idUser
     *
     * @return Question
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

    /**
     * Set nomCatf
     *
     * @param \AppBundle\Entity\CategorieForum $nomCatf
     *
     * @return Question
     */
    public function setNomCatf(\AppBundle\Entity\CategorieForum $nomCatf = null)
    {
        $this->nomCatf = $nomCatf;

        return $this;
    }

    /**
     * Get nomCatf
     *
     * @return \AppBundle\Entity\CategorieForum
     */
    public function getNomCatf()
    {
        return $this->nomCatf;
    }
}
