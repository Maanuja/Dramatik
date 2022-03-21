<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
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
    #[Assert\EqualTo(propertyPath: "password_confirm", message: "The password is invalid.")]

    private $password;

    public $password_confirm;

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
}