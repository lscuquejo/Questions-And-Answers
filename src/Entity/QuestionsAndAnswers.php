<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionsAndAnswersRepository")
 */
class QuestionsAndAnswers
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Questions;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Answers;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestions(): ?string
    {
        return $this->Questions;
    }

    public function setQuestions(string $Questions): self
    {
        $this->Questions = $Questions;

        return $this;
    }

    public function getAnswers(): ?string
    {
        return $this->Answers;
    }

    public function setAnswers(string $Answers): self
    {
        $this->Answers = $Answers;

        return $this;
    }
}
