<?php

namespace App\Entity;

use App\Repository\DramaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\Column(type: 'decimal', precision: 3, scale: 1, nullable: true)]
    private $drRate;

    #[ORM\Column(type: 'string', length: 100)]
    private $drImg;

    #[ORM\Column(type: 'string', length: 100)]
    private $drBannerImg;

    #[ORM\Column(type: 'string', length: 300)]
    private $drVideo;

    #[ORM\OneToMany(mappedBy: 'chDrama', targetEntity: Character::class)]
    private $characters;

    #[ORM\OneToMany(mappedBy: 'crDrama', targetEntity: Critic::class)]
    private $critics;

    #[ORM\OneToMany(mappedBy: 'cmDrama', targetEntity: Comment::class)]
    private $comments;

    #[ORM\OneToMany(mappedBy: 'qzDrama', targetEntity: Quizz::class)]
    private $quizzs;

    #[ORM\Column(type: 'datetime_immutable')]
    private $createdAt;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $updatedAt;

    #[ORM\Column(type: 'date', nullable: true)]
    private $drDateEnd;

    #[ORM\ManyToOne(targetEntity: Genre::class, inversedBy: 'dramas')]
    private $drGenre;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'UsDramas')]
    #[ORM\JoinColumn(nullable: false)]
    private $drAdminId;

    #[ORM\Column(type: 'text')]
    private $drPlot;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
        $this->critics = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->quizzs = new ArrayCollection();
    }

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

    /**
     * @return Collection|Character[]
     */
    public function getCharacters(): Collection
    {
        return $this->characters;
    }

    public function addCharacter(Character $character): self
    {
        if (!$this->characters->contains($character)) {
            $this->characters[] = $character;
            $character->setChDrama($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): self
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getChDrama() === $this) {
                $character->setChDrama(null);
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
            $critic->setCrDrama($this);
        }

        return $this;
    }

    public function removeCritic(Critic $critic): self
    {
        if ($this->critics->removeElement($critic)) {
            // set the owning side to null (unless already changed)
            if ($critic->getCrDrama() === $this) {
                $critic->setCrDrama(null);
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
            $comment->setCmDrama($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getCmDrama() === $this) {
                $comment->setCmDrama(null);
            }
        }

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
            $quizz->setQzDrama($this);
        }

        return $this;
    }

    public function removeQuizz(Quizz $quizz): self
    {
        if ($this->quizzs->removeElement($quizz)) {
            // set the owning side to null (unless already changed)
            if ($quizz->getQzDrama() === $this) {
                $quizz->setQzDrama(null);
            }
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getDrDateEnd(): ?\DateTimeInterface
    {
        return $this->drDateEnd;
    }

    public function setDrDateEnd(?\DateTimeInterface $drDateEnd): self
    {
        $this->drDateEnd = $drDateEnd;

        return $this;
    }

    public function getDrGenre(): ?Genre
    {
        return $this->drGenre;
    }

    public function setDrGenre(?Genre $drGenre): self
    {
        $this->drGenre = $drGenre;

        return $this;
    }

    public function getDrAdminId(): ?User
    {
        return $this->drAdminId;
    }

    public function setDrAdminId(?User $drAdminId): self
    {
        $this->drAdminId = $drAdminId;

        return $this;
    }

    public function getDrPlot(): ?string
    {
        return $this->drPlot;
    }

    public function setDrPlot(string $drPlot): self
    {
        $this->drPlot = $drPlot;

        return $this;
    }
}
