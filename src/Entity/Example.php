<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExampleRepository")
 */
class Example
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $Content;

    /**
     * @ORM\Column(type="string", length=75)
     */
    private $authorName;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\QuestionsAndAnswers", inversedBy="examples")
     * @ORM\JoinColumn(nullable=false)
     */
    private $QuestionsAndAnswers;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->Content;
    }

    public function setContent(?string $Content): self
    {
        $this->Content = $Content;

        return $this;
    }

    public function getAuthorName(): ?string
    {
        return $this->authorName;
    }

    public function setAuthorName(string $authorName): self
    {
        $this->authorName = $authorName;

        return $this;
    }

    public function getQuestionsAndAnswers(): ?QuestionsAndAnswers
    {
        return $this->QuestionsAndAnswers;
    }

    public function setQuestionsAndAnswers(?QuestionsAndAnswers $QuestionsAndAnswers): self
    {
        $this->QuestionsAndAnswers = $QuestionsAndAnswers;

        return $this;
    }
}
