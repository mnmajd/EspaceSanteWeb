<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CheckIn
 *
 * @ORM\Table(name="check_in")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CheckInRepository")
 */
class CheckIn
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    protected $date;

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
     * @var boolean
     *
     * @ORM\Column(name="checked", type="boolean", nullable=false)
     */
    private $checked;

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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return CheckIn
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set checked
     *
     * @param boolean $checked
     *
     * @return CheckIn
     */
    public function setChecked($checked)
    {
        $this->checked = $checked;

        return $this;
    }

    /**
     * Get checked
     *
     * @return boolean
     */
    public function getChecked()
    {
        return $this->checked;
    }

    /**
     * Set idUser
     *
     * @param \AppBundle\Entity\User $idUser
     *
     * @return CheckIn
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
     * @return CheckIn
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
