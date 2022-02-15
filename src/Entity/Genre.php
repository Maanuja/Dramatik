<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GenreRepository::class)]
class Genre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 20)]
    private $grName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGrName(): ?string
    {
        return $this->grName;
    }

    public function setGrName(string $grName): self
    {
        $this->grName = $grName;

        return $this;
    }
}
