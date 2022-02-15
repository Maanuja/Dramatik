<?php

namespace App\Entity;

use App\Repository\ActorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActorRepository::class)]
class Actor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 30)]
    private $acName;

    #[ORM\Column(type: 'string', length: 100)]
    private $acImg;

    #[ORM\Column(type: 'array')]
    private $acDrama = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAcName(): ?string
    {
        return $this->acName;
    }

    public function setAcName(string $acName): self
    {
        $this->acName = $acName;

        return $this;
    }

    public function getAcImg(): ?string
    {
        return $this->acImg;
    }

    public function setAcImg(string $acImg): self
    {
        $this->acImg = $acImg;

        return $this;
    }

    public function getAcDrama(): ?array
    {
        return $this->acDrama;
    }

    public function setAcDrama(array $acDrama): self
    {
        $this->acDrama = $acDrama;

        return $this;
    }
}
