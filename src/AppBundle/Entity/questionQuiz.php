<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * questionQuiz
 *
 * @ORM\Table(name="question_quiz")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\questionQuizRepository")
 */
class questionQuiz
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
     * @var int
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Quiz")
     * @ORM\JoinColumn(name="idQuiz", referencedColumnName="id")
     */
    private $idQuiz;

    /**
     * @var string
     *
     * @ORM\Column(name="question", type="string", length=255)
     */
    private $question;


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
     * Set idQuiz
     *
     * @param integer $idQuiz
     *
     * @return questionQuiz
     */
    public function setIdQuiz($idQuiz)
    {
        $this->idQuiz = $idQuiz;

        return $this;
    }

    /**
     * Get idQuiz
     *
     * @return int
     */
    public function getIdQuiz()
    {
        return $this->idQuiz;
    }

    /**
     * Set question
     *
     * @param string $question
     *
     * @return questionQuiz
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    public function __toString()
    {
        return $this->question;
    }

}

