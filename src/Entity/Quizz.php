<?php

namespace App\Entity;

use App\Repository\QuizzRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuizzRepository::class)]
class Quizz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 300)]
    private $qzName;

    #[ORM\Column(type: 'integer')]
    private $qzUser;

    #[ORM\Column(type: 'integer')]
    private $qzDrama;

    #[ORM\Column(type: 'datetime')]
    private $qzCreatedAt;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $qzUpdatedAt;

    #[ORM\Column(type: 'string', length: 10)]
    private $qzFormat;

    #[ORM\Column(type: 'string', length: 100)]
    private $qzImg;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQzName(): ?string
    {
        return $this->qzName;
    }

    public function setQzName(string $qzName): self
    {
        $this->qzName = $qzName;

        return $this;
    }

    public function getQzUser(): ?string
    {
        return $this->qzUser;
    }

    public function setQzUser(string $qzUser): self
    {
        $this->qzUser = $qzUser;

        return $this;
    }

    public function getQzDrama(): ?int
    {
        return $this->qzDrama;
    }

    public function setQzDrama(int $qzDrama): self
    {
        $this->qzDrama = $qzDrama;

        return $this;
    }

    public function getQzCreatedAt(): ?\DateTimeInterface
    {
        return $this->qzCreatedAt;
    }

    public function setQzCreatedAt(\DateTimeInterface $qzCreatedAt): self
    {
        $this->qzCreatedAt = $qzCreatedAt;

        return $this;
    }

    public function getQzUpdatedAt(): ?\DateTimeInterface
    {
        return $this->qzUpdatedAt;
    }

    public function setQzUpdatedAt(?\DateTimeInterface $qzUpdatedAt): self
    {
        $this->qzUpdatedAt = $qzUpdatedAt;

        return $this;
    }

    public function getQzFormat(): ?string
    {
        return $this->qzFormat;
    }

    public function setQzFormat(string $qzFormat): self
    {
        $this->qzFormat = $qzFormat;

        return $this;
    }

    public function getQzImg(): ?string
    {
        return $this->qzImg;
    }

    public function setQzImg(string $qzImg): self
    {
        $this->qzImg = $qzImg;

        return $this;
    }
}
