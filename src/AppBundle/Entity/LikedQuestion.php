<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LikedQuestion
 *
 * @ORM\Table(name="Liked_question", indexes={@ORM\Index(name="id_liked_reponse", columns={"id_liked_reponse", "id_user"}), @ORM\Index(name="FK_EDE0815B6B3CA4B", columns={"id_user"})})
 * @ORM\Entity
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


}

