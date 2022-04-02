<?php

namespace App\Entity;

use App\Repository\QuizzRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\Column(type: 'datetime')]
    private $qzCreatedAt;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $qzUpdatedAt;

    #[ORM\Column(type: 'enumFormat')]
    private $qzFormat;

    #[ORM\Column(type: 'string', length: 100)]
    private $qzImg;

    #[ORM\ManyToOne(targetEntity: Drama::class, inversedBy: 'quizzs')]
    #[ORM\JoinColumn(nullable: false)]
    private $qzDrama;

    #[ORM\OneToMany(mappedBy: 'scQuizz', targetEntity: Score::class)]
    private $scores;

    #[ORM\OneToMany(mappedBy: 'qtQuizz', targetEntity: Questions::class)]
    private $questions;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'quizzs')]
    #[ORM\JoinColumn(nullable: false)]
    private $qzUser;

    public function __construct()
    {
        $this->scores = new ArrayCollection();
        $this->questions = new ArrayCollection();
    }

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

    public function getQzDrama(): ?Drama
    {
        return $this->qzDrama;
    }

    public function setQzDrama(Drama $qzDrama): self
    {
        $this->qzDrama = $qzDrama;

        return $this;
    }

    /**
     * @return Collection|Score[]
     */
    public function getScores(): Collection
    {
        return $this->scores;
    }

    public function addScore(Score $score): self
    {
        if (!$this->scores->contains($score)) {
            $this->scores[] = $score;
            $score->setScQuizz($this);
        }

        return $this;
    }

    public function removeScore(Score $score): self
    {
        if ($this->scores->removeElement($score)) {
            // set the owning side to null (unless already changed)
            if ($score->getScQuizz() === $this) {
                $score->setScQuizz(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Questions[]
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(Questions $question): self
    {
        if (!$this->questions->contains($question)) {
            $this->questions[] = $question;
            $question->setQtQuizz($this);
        }

        return $this;
    }

    public function removeQuestion(Questions $question): self
    {
        if ($this->questions->removeElement($question)) {
            // set the owning side to null (unless already changed)
            if ($question->getQtQuizz() === $this) {
                $question->setQtQuizz(null);
            }
        }

        return $this;
    }

    public function getQzUser(): ?User
    {
        return $this->qzUser;
    }

    public function setQzUser(?User $qzUser): self
    {
        $this->qzUser = $qzUser;

        return $this;
    }
}
