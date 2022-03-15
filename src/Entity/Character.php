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


    #[ORM\Column(type: 'array')]
    private $chQualities = [];

    #[ORM\ManyToOne(targetEntity: Drama::class, inversedBy: 'characters')]
    #[ORM\JoinColumn(nullable: false)]
    private $chDrama;

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

    public function getChQualities(): ?array
    {
        return $this->chQualities;
    }

    public function setChQualities(array $chQualities): self
    {
        $this->chQualities = $chQualities;

        return $this;
    }

    public function getChDrama(): ?Drama
    {
        return $this->chDrama;
    }

    public function setChDrama(?Drama $chDrama): self
    {
        $this->chDrama = $chDrama;

        return $this;
    }
}
