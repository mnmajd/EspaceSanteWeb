<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReclamationRepository")
 */
class Reclamation
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
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */

private $confirmation;

    /**
     *
     * @var \AppBundle\Entity\User
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_user",referencedColumnName="id_user")
     * })
     */
    private $idUser;


    /**
     *
     * @var \AppBundle\Entity\Service
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Service",cascade={"remove"})
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_service",referencedColumnName="id_service",onDelete="cascade")
     * })
     */

private $idService;

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
     * Set description
     *
     * @param string $description
     *
     * @return Reclamation
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
     * Get idUser
     * @return User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idUser
     *
     * @param User $idUser
     *
     * @return Service
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
        return $this;
    }

    /**
     * @return Service
     */
    public function getIdService()
    {
        return $this->idService;
    }

    /**
     * @param Service $idService
     */
    public function setIdService($idService)
    {
        $this->idService = $idService;
    }

    /**
     * Get confirmation
     * @return integer
     */
    public function getConfirmation()
    {
        return $this->confirmation;
    }

    /**
     * Set confirmation
     * @param integer $confirmation
     * @return Reclamation
     */
    public function setConfirmation($confirmation)
    {
        $this->confirmation = $confirmation;
        return $this;
    }


}

