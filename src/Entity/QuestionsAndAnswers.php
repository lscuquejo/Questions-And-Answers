<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Example", mappedBy="QuestionsAndAnswers")
     */
    private $examples;

    public function __construct()
    {
        $this->examples = new ArrayCollection();
    }

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

    /**
     * @return Collection|Example[]
     */
    public function getExamples(): Collection
    {
        return $this->examples;
    }

    public function addExample(Example $example): self
    {
        if (!$this->examples->contains($example)) {
            $this->examples[] = $example;
            $example->setQuestionsAndAnswers($this);
        }

        return $this;
    }

    public function removeExample(Example $example): self
    {
        if ($this->examples->contains($example)) {
            $this->examples->removeElement($example);
            // set the owning side to null (unless already changed)
            if ($example->getQuestionsAndAnswers() === $this) {
                $example->setQuestionsAndAnswers(null);
            }
        }

        return $this;
    }
}
