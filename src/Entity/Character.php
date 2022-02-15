<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterRepository::class)]
class Character
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 15)]
    private $chName;

    #[ORM\Column(type: 'integer')]
    private $chDrama;

    #[ORM\Column(type: 'array')]
    private $chQualities = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChName(): ?string
    {
        return $this->chName;
    }

    public function setChName(string $chName): self
    {
        $this->chName = $chName;

        return $this;
    }

    public function getChDrama(): ?int
    {
        return $this->chDrama;
    }

    public function setChDrama(int $chDrama): self
    {
        $this->chDrama = $chDrama;

        return $this;
    }

    public function getChQualities(): ?array
    {
        return $this->chQualities;
    }

    public function setChQualities(array $chQualities): self
    {
        $this->chQualities = $chQualities;

        return $this;
    }
}
