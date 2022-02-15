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

    #[ORM\Column(type: 'integer')]
    private $chQuestion;

    #[ORM\Column(type: 'text', nullable: true)]
    private $chChoice;

    #[ORM\Column(type: 'boolean')]
    private $chTrue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChQuestion(): ?int
    {
        return $this->chQuestion;
    }

    public function setChQuestion(int $chQuestion): self
    {
        $this->chQuestion = $chQuestion;

        return $this;
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
}
