<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 40)]
    private $ctFName;

    #[ORM\Column(type: 'string', length: 40)]
    private $ctLName;

    #[ORM\Column(type: 'string', length: 75)]
    private $ctMail;

    #[ORM\Column(type: 'string', length: 15)]
    private $ctTel;

    #[ORM\Column(type: 'text')]
    private $ctMessage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCtFName(): ?string
    {
        return $this->ctFName;
    }

    public function setCtFName(string $ctFName): self
    {
        $this->ctFName = $ctFName;

        return $this;
    }

    public function getCtLName(): ?string
    {
        return $this->ctLName;
    }

    public function setCtLName(string $ctLName): self
    {
        $this->ctLName = $ctLName;

        return $this;
    }

    public function getCtMail(): ?string
    {
        return $this->ctMail;
    }

    public function setCtMail(string $ctMail): self
    {
        $this->ctMail = $ctMail;

        return $this;
    }

    public function getCtTel(): ?string
    {
        return $this->ctTel;
    }

    public function setCtTel(string $ctTel): self
    {
        $this->ctTel = $ctTel;

        return $this;
    }

    public function getCtMessage(): ?string
    {
        return $this->ctMessage;
    }

    public function setCtMessage(string $ctMessage): self
    {
        $this->ctMessage = $ctMessage;

        return $this;
    }
}
