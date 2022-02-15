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

    #[ORM\Column(type: 'integer')]
    private $scUser;

    #[ORM\Column(type: 'integer')]
    private $scQuizz;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $scScore;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScUser(): ?int
    {
        return $this->scUser;
    }

    public function setScUser(int $scUser): self
    {
        $this->scUser = $scUser;

        return $this;
    }

    public function getScQuizz(): ?int
    {
        return $this->scQuizz;
    }

    public function setScQuizz(int $scQuizz): self
    {
        $this->scQuizz = $scQuizz;

        return $this;
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
}
