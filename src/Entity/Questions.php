<?php

namespace App\Entity;

use App\Repository\QuestionsRepository;
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

    #[ORM\Column(type: 'integer')]
    private $qtQuizz;

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

    public function getQtQuizz(): ?int
    {
        return $this->qtQuizz;
    }

    public function setQtQuizz(int $qtQuizz): self
    {
        $this->qtQuizz = $qtQuizz;

        return $this;
    }
}
