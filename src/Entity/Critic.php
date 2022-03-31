<?php

namespace App\Entity;

use App\Repository\CriticRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CriticRepository::class)]
class Critic
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

        #[ORM\Column(type: 'datetime')]
    private $crCreatedAt;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $crUpdatedAt;

    #[ORM\Column(type: 'string', length: 50)]
    private $crTitle;

    #[ORM\Column(type: 'text')]
    private $crCritic;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $crLike;

    #[ORM\Column(type: 'integer')]
    private $crStory;

    #[ORM\Column(type: 'decimal', precision: 2, scale: 1)]
    private $crMusic;

    #[ORM\Column(type: 'decimal', precision: 2, scale: 1)]
    private $crCasting;

    #[ORM\Column(type: 'decimal', precision: 2, scale: 1)]
    private $crRate;

    #[ORM\ManyToOne(targetEntity: Drama::class, inversedBy: 'critics')]
    #[ORM\JoinColumn(nullable: false)]
    private $crDrama;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'critics')]
    #[ORM\JoinColumn(nullable: false)]
    private $crUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCrCreatedAt(): ?\DateTimeInterface
    {
        return $this->crCreatedAt;
    }

    public function setCrCreatedAt(\DateTimeInterface $crCreatedAt): self
    {
        $this->crCreatedAt = $crCreatedAt;

        return $this;
    }

    public function getCrUpdatedAt(): ?\DateTimeInterface
    {
        return $this->crUpdatedAt;
    }

    public function setCrUpdatedAt(?\DateTimeInterface $crUpdatedAt): self
    {
        $this->crUpdatedAt = $crUpdatedAt;

        return $this;
    }

    public function getCrTitle(): ?string
    {
        return $this->crTitle;
    }

    public function setCrTitle(string $crTitle): self
    {
        $this->crTitle = $crTitle;

        return $this;
    }

    public function getCrCritic(): ?string
    {
        return $this->crCritic;
    }

    public function setCrCritic(string $crCritic): self
    {
        $this->crCritic = $crCritic;

        return $this;
    }

    public function getCrLike(): ?int
    {
        return $this->crLike;
    }

    public function setCrLike(?int $crLike): self
    {
        $this->crLike = $crLike;

        return $this;
    }

    public function getCrStory(): ?int
    {
        return $this->crStory;
    }

    public function setCrStory(int $crStory): self
    {
        $this->crStory = $crStory;

        return $this;
    }

    public function getCrMusic(): ?string
    {
        return $this->crMusic;
    }

    public function setCrMusic(string $crMusic): self
    {
        $this->crMusic = $crMusic;

        return $this;
    }

    public function getCrCasting(): ?string
    {
        return $this->crCasting;
    }

    public function setCrCasting(string $crCasting): self
    {
        $this->crCasting = $crCasting;

        return $this;
    }

    public function getCrRate(): ?string
    {
        return $this->crRate;
    }

    public function setCrRate(string $crRate): self
    {
        $this->crRate = $crRate;

        return $this;
    }

    public function getCrUser(): ?User
    {
        return $this->crUser;
    }

    public function setCrUser(?User $crUser): self
    {
        $this->crUser = $crUser;

        return $this;
    }

    public function getCrDrama(): ?Drama
    {
        return $this->crDrama;
    }

    public function setCrDrama(?Drama $crDrama): self
    {
        $this->crDrama = $crDrama;

        return $this;
    }
}
