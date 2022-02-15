<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $cmUser;

    #[ORM\Column(type: 'text')]
    private $cmComment;

    #[ORM\Column(type: 'datetime')]
    private $cmDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCmUser(): ?int
    {
        return $this->cmUser;
    }

    public function setCmUser(int $cmUser): self
    {
        $this->cmUser = $cmUser;

        return $this;
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
}
