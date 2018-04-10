<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponse
 *
 * @ORM\Table(name="reponse", indexes={@ORM\Index(name="id_question", columns={"id_question", "id_user"}), @ORM\Index(name="FK_5FB6DEC76B3CA4B", columns={"id_user"}), @ORM\Index(name="IDX_5FB6DEC7E62CA5DB", columns={"id_question"})})
 * @ORM\Entity
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
     * Set contenuRep
     *
     * @param string $contenuRep
     *
     * @return Reponse
     */
    public function setContenuRep($contenuRep)
    {
        $this->contenuRep = $contenuRep;

        return $this;
    }

    /**
     * Get contenuRep
     *
     * @return string
     */
    public function getContenuRep()
    {
        return $this->contenuRep;
    }

    /**
     * Set nbrAimeRep
     *
     * @param integer $nbrAimeRep
     *
     * @return Reponse
     */
    public function setNbrAimeRep($nbrAimeRep)
    {
        $this->nbrAimeRep = $nbrAimeRep;

        return $this;
    }

    /**
     * Get nbrAimeRep
     *
     * @return integer
     */
    public function getNbrAimeRep()
    {
        return $this->nbrAimeRep;
    }

    /**
     * Set datePublication
     *
     * @param \DateTime $datePublication
     *
     * @return Reponse
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
     * Get idRep
     *
     * @return integer
     */
    public function getIdRep()
    {
        return $this->idRep;
    }

    /**
     * Set idUser
     *
     * @param \AppBundle\Entity\User $idUser
     *
     * @return Reponse
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
     * Set idQuestion
     *
     * @param \AppBundle\Entity\Question $idQuestion
     *
     * @return Reponse
     */
    public function setIdQuestion(\AppBundle\Entity\Question $idQuestion = null)
    {
        $this->idQuestion = $idQuestion;

        return $this;
    }

    /**
     * Get idQuestion
     *
     * @return \AppBundle\Entity\Question
     */
    public function getIdQuestion()
    {
        return $this->idQuestion;
    }
}
