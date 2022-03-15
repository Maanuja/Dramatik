<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\Column(type: 'roleFormat')]
    private $UsRole;

    #[ORM\Column(type: 'string', length: 100)]
    private $usBanImg;

    #[ORM\Column(type: 'string', length: 100)]
    private $usImg;

    #[ORM\OneToMany(mappedBy: 'qzUser', targetEntity: Quizz::class, orphanRemoval: true)]
    private $quizzs;

    #[ORM\OneToMany(mappedBy: 'scUser', targetEntity: Score::class, orphanRemoval: true)]
    private $scores;

    #[ORM\OneToMany(mappedBy: 'crUser', targetEntity: Critic::class)]
    private $critics;

    #[ORM\OneToMany(mappedBy: 'cmUser', targetEntity: Comment::class)]
    private $comments;

    public function __construct()
    {
        $this->quizzs = new ArrayCollection();
        $this->scores = new ArrayCollection();
        $this->critics = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

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

    /**
     * @return Collection|Quizz[]
     */
    public function getQuizzs(): Collection
    {
        return $this->quizzs;
    }

    public function addQuizz(Quizz $quizz): self
    {
        if (!$this->quizzs->contains($quizz)) {
            $this->quizzs[] = $quizz;
            $quizz->setQzUser($this);
        }

        return $this;
    }

    public function removeQuizz(Quizz $quizz): self
    {
        if ($this->quizzs->removeElement($quizz)) {
            // set the owning side to null (unless already changed)
            if ($quizz->getQzUser() === $this) {
                $quizz->setQzUser(null);
            }
        }

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
            $score->setScUser($this);
        }

        return $this;
    }

    public function removeScore(Score $score): self
    {
        if ($this->scores->removeElement($score)) {
            // set the owning side to null (unless already changed)
            if ($score->getScUser() === $this) {
                $score->setScUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Critic[]
     */
    public function getCritics(): Collection
    {
        return $this->critics;
    }

    public function addCritic(Critic $critic): self
    {
        if (!$this->critics->contains($critic)) {
            $this->critics[] = $critic;
            $critic->setCrUser($this);
        }

        return $this;
    }

    public function removeCritic(Critic $critic): self
    {
        if ($this->critics->removeElement($critic)) {
            // set the owning side to null (unless already changed)
            if ($critic->getCrUser() === $this) {
                $critic->setCrUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setCmUser($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getCmUser() === $this) {
                $comment->setCmUser(null);
            }
        }

        return $this;
    }
}
