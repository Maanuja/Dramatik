<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 16)]
    private $UsUser;

    #[ORM\Column(type: 'string', length: 16)]
    private $UsPass;

    #[ORM\Column(type: 'string', length: 20)]
    private $UsLName;

    #[ORM\Column(type: 'string', length: 20)]
    private $UsFName;

    #[ORM\Column(type: 'string', length: 50)]
    private $UsMail;

    #[ORM\Column(type: 'string', length: 20)]
    private $UsRole;

    #[ORM\Column(type: 'string', length: 100)]
    private $usBanImg;

    #[ORM\Column(type: 'string', length: 100)]
    private $usImg;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsUser(): ?string
    {
        return $this->UsUser;
    }

    public function setUsUser(string $UsUser): self
    {
        $this->UsUser = $UsUser;

        return $this;
    }

    public function getUsPass(): ?string
    {
        return $this->UsPass;
    }

    public function setUsPass(string $UsPass): self
    {
        $this->UsPass = $UsPass;

        return $this;
    }

    public function getUsLName(): ?string
    {
        return $this->UsLName;
    }

    public function setUsLName(string $UsLName): self
    {
        $this->UsLName = $UsLName;

        return $this;
    }

    public function getUsFName(): ?string
    {
        return $this->UsFName;
    }

    public function setUsFName(string $UsFName): self
    {
        $this->UsFName = $UsFName;

        return $this;
    }

    public function getUsMail(): ?string
    {
        return $this->UsMail;
    }

    public function setUsMail(string $UsMail): self
    {
        $this->UsMail = $UsMail;

        return $this;
    }

    public function getUsRole(): ?string
    {
        return $this->UsRole;
    }

    public function setUsRole(string $UsRole): self
    {
        $this->UsRole = $UsRole;

        return $this;
    }

    public function getUsBanImg(): ?string
    {
        return $this->usBanImg;
    }

    public function setUsBanImg(string $usBanImg): self
    {
        $this->usBanImg = $usBanImg;

        return $this;
    }

    public function getUsImg(): ?string
    {
        return $this->usImg;
    }

    public function setUsImg(string $usImg): self
    {
        $this->usImg = $usImg;

        return $this;
    }
}
