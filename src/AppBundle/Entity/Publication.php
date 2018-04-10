<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publication
 *
 * @ORM\Table(name="publication")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PublicationRepository")
 */
class Publication
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string")
     */
    private $Contenu;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_publication", type="datetime", nullable=false)
     */
    private $datePublication = 'CURRENT_TIMESTAMP';



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
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Discussion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idDisc", referencedColumnName="id")
     * })
     */
    private $idDisc;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Publication
     */
    public function setContenu($contenu)
    {
        $this->Contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->Contenu;
    }

    /**
     * Set datePublication
     *
     * @param \DateTime $datePublication
     *
     * @return Publication
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
     * Set idUser
     *
     * @param \AppBundle\Entity\User $idUser
     *
     * @return Publication
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
     * Set idDisc
     *
     * @param \AppBundle\Entity\Discussion $idDisc
     *
     * @return Publication
     */
    public function setIdDisc(\AppBundle\Entity\Discussion $idDisc = null)
    {
        $this->idDisc = $idDisc;

        return $this;
    }

    /**
     * Get idDisc
     *
     * @return \AppBundle\Entity\Discussion
     */
    public function getIdDisc()
    {
        return $this->idDisc;
    }
}
