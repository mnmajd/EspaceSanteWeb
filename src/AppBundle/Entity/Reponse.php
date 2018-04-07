<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponse
 * @ORM\Table(name="reponse")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReponseRepository")
 */
class Reponse
{
    /**
     * @var string
     *
     * @ORM\Column(name="contenu_rep", type="text", length=65535, nullable=false)
     */
    private $contenuRep;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_aime_rep", type="integer", nullable=false)
     */
    private $nbrAimeRep;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_publication", type="datetime", nullable=false)
     */
    private $datePublication = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="id_rep", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRep;

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
     * @var \AppBundle\Entity\Question
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Question")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_question", referencedColumnName="id_question")
     * })
     */
    private $idQuestion;

    /**
     * @return string
     */
    public function getContenuRep()
    {
        return $this->contenuRep;
    }

    /**
     * @param string $contenuRep
     */
    public function setContenuRep($contenuRep)
    {
        $this->contenuRep = $contenuRep;
    }

    /**
     * @return int
     */
    public function getNbrAimeRep()
    {
        return $this->nbrAimeRep;
    }

    /**
     * @param int $nbrAimeRep
     */
    public function setNbrAimeRep($nbrAimeRep)
    {
        $this->nbrAimeRep = $nbrAimeRep;
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
    public function getIdRep()
    {
        return $this->idRep;
    }

    /**
     * @param int $idRep
     */
    public function setIdRep($idRep)
    {
        $this->idRep = $idRep;
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
     * @return Question
     */
    public function getIdQuestion()
    {
        return $this->idQuestion;
    }

    /**
     * @param Question $idQuestion
     */
    public function setIdQuestion($idQuestion)
    {
        $this->idQuestion = $idQuestion;
    }

    public function __construct()
    {
        $this->nbrAimeRep = 0;
        $this->datePublication = new \DateTime();
    }
}

