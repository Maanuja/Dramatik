<?php

namespace App\Entity;

use App\Repository\DramaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DramaRepository::class)]
class Drama
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 40)]
    private $drName;

    #[ORM\Column(type: 'date')]
    private $drDate;

    #[ORM\Column(type: 'integer')]
    private $drNbEp;

    #[ORM\Column(type: 'decimal', precision: 2, scale: 1, nullable: true)]
    private $drRate;

    #[ORM\Column(type: 'string', length: 100)]
    private $drImg;

    #[ORM\Column(type: 'string', length: 100)]
    private $drBannerImg;

    #[ORM\Column(type: 'string', length: 300)]
    private $drVideo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDrName(): ?string
    {
        return $this->drName;
    }

    public function setDrName(string $drName): self
    {
        $this->drName = $drName;

        return $this;
    }

    public function getDrDate(): ?\DateTimeInterface
    {
        return $this->drDate;
    }

    public function setDrDate(\DateTimeInterface $drDate): self
    {
        $this->drDate = $drDate;

        return $this;
    }

    public function getDrRate(): ?string
    {
        return $this->drRate;
    }

    public function setDrRate(string $drRate): self
    {
        $this->drRate = $drRate;

        return $this;
    }

    public function getDrNbEp(): ?int
    {
        return $this->drNbEp;
    }

    public function setDrNbEp(int $drNbEp): self
    {
        $this->drNbEp = $drNbEp;

        return $this;
    }

    public function getDrImg(): ?string
    {
        return $this->drImg;
    }

    public function setDrImg(string $drImg): self
    {
        $this->drImg = $drImg;

        return $this;
    }

    public function getDrBannerImg(): ?string
    {
        return $this->drBannerImg;
    }

    public function setDrBannerImg(string $drBannerImg): self
    {
        $this->drBannerImg = $drBannerImg;

        return $this;
    }

    public function getDrVideo(): ?string
    {
        return $this->drVideo;
    }

    public function setDrVideo(string $drVideo): self
    {
        $this->drVideo = $drVideo;

        return $this;
    }
}
