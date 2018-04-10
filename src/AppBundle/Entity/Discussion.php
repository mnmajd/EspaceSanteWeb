<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Discussion
 *
 * @ORM\Table(name="discussion")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DiscussionRepository")
 */
class Discussion
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
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Defis")
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
     * Set idDefis
     *
     * @param \AppBundle\Entity\Defis $idDefis
     *
     * @return Discussion
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
