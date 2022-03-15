<?php

namespace App\Entity;

use App\Repository\ChoicesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChoicesRepository::class)]
class Choices
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text', nullable: true)]
    private $chChoice;

    #[ORM\Column(type: 'boolean')]
    private $chTrue;

    #[ORM\ManyToOne(targetEntity: Questions::class, inversedBy: 'choices')]
    #[ORM\JoinColumn(nullable: false)]
    private $chQuestion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChChoice(): ?string
    {
        return $this->chChoice;
    }

    public function setChChoice(string $chChoice): self
    {
        $this->chChoice = $chChoice;

        return $this;
    }

    public function getChTrue(): ?bool
    {
        return $this->chTrue;
    }

    public function setChTrue(bool $chTrue): self
    {
        $this->chTrue = $chTrue;

        return $this;
    }

    public function getChQuestion(): ?Questions
    {
        return $this->chQuestion;
    }

    public function setChQuestion(?Questions $chQuestion): self
    {
        $this->chQuestion = $chQuestion;

        return $this;
    }
}
