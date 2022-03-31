<?php

namespace App\Entity;

use App\Repository\NewsletterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NewsletterRepository::class)]
class Newsletter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 60)]
    private $nslMail;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNslMail(): ?string
    {
        return $this->nslMail;
    }

    public function setNslMail(string $nslMail): self
    {
        $this->nslMail = $nslMail;

        return $this;
    }
}
