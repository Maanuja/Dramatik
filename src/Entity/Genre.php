<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @UniqueEntity(fields={"grName"}, message="Il y a déja ce genre dans la liste !")
 */
#[ORM\Entity(repositoryClass: GenreRepository::class)]
class Genre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 20)]
    private $grName;

    #[ORM\OneToMany(mappedBy: 'drGenre', targetEntity: Drama::class)]
    private $dramas;

    public function __construct()
    {
        $this->dramas = new ArrayCollection();
    }

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

    /**
     * @return Collection|Drama[]
     */
    public function getDramas(): Collection
    {
        return $this->dramas;
    }

    public function addDrama(Drama $drama): self
    {
        if (!$this->dramas->contains($drama)) {
            $this->dramas[] = $drama;
            $drama->setDrGenre($this);
        }

        return $this;
    }

    public function removeDrama(Drama $drama): self
    {
        if ($this->dramas->removeElement($drama)) {
            // set the owning side to null (unless already changed)
            if ($drama->getDrGenre() === $this) {
                $drama->setDrGenre(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->grName;
    }
}
