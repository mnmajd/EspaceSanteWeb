<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Defis
 *
 * @ORM\Table(name="defis")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DefisRepository")
 */
class Defis
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
     * @ORM\Column(name="titre", type="string")
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string")
     */
    private $description;
    /**
     * @var integer
     *
     * @ORM\Column(name="deadline", type="integer")
     */
    private $deadline;
    /**
     * @var date
     *
     * @ORM\Column(name="startsAt", type="date")
     */
    private $startsAt;
    /**
     * @var integer
     *
     * @ORM\Column(name="maxmember", type="integer")
     */
    private $maxmember;
    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string")
     */
    private $image;

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
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * @param int $deadline
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    }

    /**
     * @return date
     */
    public function getStartsAt()
    {
        return $this->startsAt;
    }

    /**
     * @param date $startsAt
     */
    public function setStartsAt($startsAt)
    {
        $this->startsAt = $startsAt;
    }

    /**
     * @return int
     */
    public function getMaxmember()
    {
        return $this->maxmember;
    }

    /**
     * @param int $maxmember
     */
    public function setMaxmember($maxmember)
    {
        $this->maxmember = $maxmember;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Defis
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    public function __toString() {

        return $this->titre;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

}

