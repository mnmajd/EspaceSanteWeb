<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MembresDefis
 *
 * @ORM\Table(name="membres_defis")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MembresDefisRepository")
 */
class MembresDefis
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Defis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idDefis", referencedColumnName="id")
     * })
     */
    private $idDefis;
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
     * Set idUser
     *
     * @param \AppBundle\Entity\User $idUser
     *
     * @return MembresDefis
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
     * Set idDefis
     *
     * @param \AppBundle\Entity\Defis $idDefis
     *
     * @return MembresDefis
     */
    public function setIdDefis(\AppBundle\Entity\Defis $idDefis = null)
    {
        $this->idDefis = $idDefis;

        return $this;
    }

    /**
     * Get idDefis
     *
     * @return \AppBundle\Entity\Defis
     */
    public function getIdDefis()
    {
        return $this->idDefis;
    }
}
