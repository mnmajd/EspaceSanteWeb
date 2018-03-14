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


}

