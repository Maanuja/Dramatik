<?php

namespace App\Entity;

use App\Repository\QuestionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionsRepository::class)]
class Questions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $qtQuestion;

    #[ORM\ManyToOne(targetEntity: Quizz::class, inversedBy: 'questions')]
    #[ORM\JoinColumn(nullable: false)]
    private $qtQuizz;

    #[ORM\OneToMany(mappedBy: 'chQuestion', targetEntity: Choices::class)]
    private $choices;

    public function __construct()
    {
        $this->choices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQtQuestion(): ?string
    {
        return $this->qtQuestion;
    }

    public function setQtQuestion(string $qtQuestion): self
    {
        $this->qtQuestion = $qtQuestion;

        return $this;
    }

    public function getQtQuizz(): ?Quizz
    {
        return $this->qtQuizz;
    }

    public function setQtQuizz(?Quizz $qtQuizz): self
    {
        $this->qtQuizz = $qtQuizz;

        return $this;
    }

    /**
     * @return Collection|Choices[]
     */
    public function getChoices(): Collection
    {
        return $this->choices;
    }

    public function addChoice(Choices $choice): self
    {
        if (!$this->choices->contains($choice)) {
            $this->choices[] = $choice;
            $choice->setChQuestion($this);
        }

        return $this;
    }

    public function removeChoice(Choices $choice): self
    {
        if ($this->choices->removeElement($choice)) {
            // set the owning side to null (unless already changed)
            if ($choice->getChQuestion() === $this) {
                $choice->setChQuestion(null);
            }
        }

        return $this;
    }
}
