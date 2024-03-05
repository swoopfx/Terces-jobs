<?php

namespace General\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="job_screening_questions")
 */
class JobScreeningQuestions
{

    /**
     *
     * @var integer @ORM\Column(name="id", type="integer", nullable=false)
     *      @ORM\Id
     *      @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Undocumented variable
     * @ORM\Column(nullable=false)
     * @var string
     */
    private $screenQuestions;

    /**
     * Undocumented variable
     * @ORM\Column(nullable=false, type="text")
     * @var string
     */
    private string $associatedQuestion;

    /**
     * Get @ORM\Column(name="id", type="integer", nullable=false)
     *
     * @return  integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get undocumented variable
     *
     * @return  string
     */
    public function getScreenQuestions()
    {
        return $this->screenQuestions;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $screenQuestions  Undocumented variable
     *
     * @return  self
     */
    public function setScreenQuestions(string $screenQuestions)
    {
        $this->screenQuestions = $screenQuestions;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  string
     */ 
    public function getAssociatedQuestion()
    {
        return $this->associatedQuestion;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $associatedQuestion  Undocumented variable
     *
     * @return  self
     */ 
    public function setAssociatedQuestion(string $associatedQuestion)
    {
        $this->associatedQuestion = $associatedQuestion;

        return $this;
    }
}
