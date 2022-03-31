<?php

namespace App\Entity;

use App\Repository\ScoreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScoreRepository::class)]
class Score
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;


    #[ORM\Column(type: 'integer', nullable: true)]
    private $scScore;

    #[ORM\ManyToOne(targetEntity: Quizz::class, inversedBy: 'scores')]
    #[ORM\JoinColumn(nullable: false)]
    private $scQuizz;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'scores')]
    #[ORM\JoinColumn(nullable: false)]
    private $scUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScScore(): ?int
    {
        return $this->scScore;
    }

    public function setScScore(?int $scScore): self
    {
        $this->scScore = $scScore;

        return $this;
    }

    public function getScQuizz(): ?Quizz
    {
        return $this->scQuizz;
    }

    public function setScQuizz(?Quizz $scQuizz): self
    {
        $this->scQuizz = $scQuizz;

        return $this;
    }

    public function getScUser(): ?User
    {
        return $this->scUser;
    }

    public function setScUser(?User $scUser): self
    {
        $this->scUser = $scUser;

        return $this;
    }
}
