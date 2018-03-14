<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question", indexes={@ORM\Index(name="id_catF", columns={"id_user"}), @ORM\Index(name="nom_catF", columns={"nom_catF"})})
 * @ORM\Entity
 */
class Question
{
    /**
     * @var string
     *
     * @ORM\Column(name="contenu_quest", type="text", length=65535, nullable=false)
     */
    private $contenuQuest;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Approved_Question", type="boolean", nullable=false)
     */
    private $approvedQuestion;

    /**
     * @var string
     *
     * @ORM\Column(name="Sujet_Question", type="string", length=30, nullable=false)
     */
    private $sujetQuestion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_publication", type="datetime", nullable=false)
     */
    private $datePublication = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_rep", type="integer", nullable=false)
     */
    private $nbrRep;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_question", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idQuestion;

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
     * @var \AppBundle\Entity\CategorieForum
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CategorieForum")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nom_catF", referencedColumnName="nom_catF")
     * })
     */
    private $nomCatf;


}

