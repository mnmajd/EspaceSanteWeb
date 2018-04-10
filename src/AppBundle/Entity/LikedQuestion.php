<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LikedQuestion
 * @ORM\Table(name="Liked_question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LikedQuestionRepository")
 */
class LikedQuestion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_liked_reponse", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLikedReponse;

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
     * @var \AppBundle\Entity\Reponse
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Reponse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_rep", referencedColumnName="id_rep")
     * })
     */
    private $idRep;

    /**
     * @return int
     */
    public function getIdLikedReponse()
    {
        return $this->idLikedReponse;
    }

    /**
     * @param int $idLikedReponse
     */
    public function setIdLikedReponse($idLikedReponse)
    {
        $this->idLikedReponse = $idLikedReponse;
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
     * @return Reponse
     */
    public function getIdRep()
    {
        return $this->idRep;
    }

    /**
     * @param Reponse $idRep
     */
    public function setIdRep($idRep)
    {
        $this->idRep = $idRep;
    }


}

