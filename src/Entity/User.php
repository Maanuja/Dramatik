<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @UniqueEntity(fields={"email"}, message="Il y a déjà un utilisateur avec cet email")
 * @UniqueEntity(fields={"username"}, message="Il y a déjà un utilisateur avec ce pseudo")

 */
#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $email;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(type: 'string', length: 30)]
    private $username;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $UsLname;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $UsFname;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $UsBanImg;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $UsImg;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;


    #[ORM\OneToMany(mappedBy: 'drAdminId', targetEntity: Drama::class, orphanRemoval: true)]
    private $UsDramas;

    #[ORM\OneToMany(mappedBy: 'qzUser', targetEntity: Quizz::class, orphanRemoval: true)]
    private $quizzs;

    #[ORM\OneToMany(mappedBy: 'crUser', targetEntity: Critic::class, orphanRemoval: true)]
    private $critics;

    #[ORM\OneToMany(mappedBy: 'scUser', targetEntity: Score::class, orphanRemoval: true)]
    private $scores;

    public function __construct()
    {
        $this->UsDramas = new ArrayCollection();
        $this->quizzs = new ArrayCollection();
        $this->critics = new ArrayCollection();
        $this->scores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getUsLname(): ?string
    {
        return $this->UsLname;
    }

    public function setUsLname(?string $UsLname): self
    {
        $this->UsLname = $UsLname;

        return $this;
    }

    public function getUsFname(): ?string
    {
        return $this->UsFname;
    }

    public function setUsFname(?string $UsFname): self
    {
        $this->UsFname = $UsFname;

        return $this;
    }

    public function getUsBanImg(): ?string
    {
        return $this->UsBanImg;
    }

    public function setUsBanImg(?string $UsBanImg): self
    {
        $this->UsBanImg = $UsBanImg;

        return $this;
    }

    public function getUsImg(): ?string
    {
        return $this->UsImg;
    }

    public function setUsImg(?string $UsImg): self
    {
        $this->UsImg = $UsImg;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    /**

     * @return Collection|Drama[]
     */
    public function getUsDramas(): Collection
    {
        return $this->UsDramas;
    }

    public function addUsDrama(Drama $usDrama): self
    {
        if (!$this->UsDramas->contains($usDrama)) {
            $this->UsDramas[] = $usDrama;
            $usDrama->setDrAdminId($this);
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
            $quizz->setQzUser($this);
        }

        return $this;
    }


    public function removeUsDrama(Drama $usDrama): self
    {
        if ($this->UsDramas->removeElement($usDrama)) {
            // set the owning side to null (unless already changed)
            if ($usDrama->getDrAdminId() === $this) {
                $usDrama->setDrAdminId(null);
            }
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
}
