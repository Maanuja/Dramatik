<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @UniqueEntity(fields={"cmComment"}, message="Il y a deja ce commentaire")
 */
#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $cmComment;

    #[ORM\Column(type: 'datetime')]
    private $cmDate;

    #[ORM\ManyToOne(targetEntity: Drama::class, inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    private $cmDrama;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCmComment(): ?string
    {
        return $this->cmComment;
    }

    public function setCmComment(string $cmComment): self
    {
        $this->cmComment = $cmComment;

        return $this;
    }

    public function getCmDate(): ?\DateTimeInterface
    {
        return $this->cmDate;
    }

    public function setCmDate(\DateTimeInterface $cmDate): self
    {
        $this->cmDate = $cmDate;

        return $this;
    }

    public function getCmDrama(): ?Drama
    {
        return $this->cmDrama;
    }

    public function setCmDrama(?Drama $cmDrama): self
    {
        $this->cmDrama = $cmDrama;

        return $this;
    }
}
