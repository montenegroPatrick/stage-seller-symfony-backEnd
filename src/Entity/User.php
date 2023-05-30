<?php

namespace App\Entity;

use App\Repository\UserRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 * @UniqueEntity(fields={"email"}, message="This email is already taken.", groups={"registration"})
 * ORM\HasLifecycleCallbacks
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("user_browse")
     * @Groups("user_read")
     * @Groups("matches")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups("user_browse")
     * @Groups("user_read")
     * @Assert\Email(groups={"login", "registration", "update"})
     * @Assert\NotBlank(groups={"login", "registration"})
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\NotBlank(groups={"login", "registration"})
     * @Assert\Length(min=4, groups={"login", "registration", "udpate"})
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=7)
     * @Assert\Choice
     * (
     * choices={"COMPANY", "STUDENT"}, 
     * message="Invalid type provided. Must be a 'STUDENT' or a 'COMPANY'"
     * ,groups={"choice"}
     * )
     * @Assert\NotBlank(groups={"registration"})
     * @Groups("user_browse")
     * @Groups("user_read")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     * @Groups("user_browse")
     * @Groups("user_read")
     * @Assert\NotBlank(groups={"company"})
     */
    private $companyName;

    /**
     * @ORM\Column(type="string", length=14, nullable=true)
     * @Groups("user_browse")
     * @Groups("user_read")
     * @Assert\NotBlank(groups={"company"})
     */
    private $siret;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     * @Groups("user_browse")
     * @Groups("user_read")
     * @Assert\NotBlank(groups={"student"})
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     * @Groups("user_browse")
     * @Groups("user_read")
     * @Assert\NotBlank(groups={"student"})
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("user_browse")
     * @Groups("user_read")
     * @Assert\NotBlank(groups={"registration"})
     */
    private $address;

    /**
     * @ORM\Column(type="integer")
     * @Groups("user_browse")
     * @Groups("user_read")
     * @Assert\NotBlank(groups={"registration"})
     */
    private $postCode;

    /**
     * @ORM\Column(type="string", length=64)
     * @Groups("user_browse")
     * @Groups("user_read")
     * @Assert\NotBlank(groups={"registration"})
     */
    private $city;

    /**
     * @ORM\Column(type="boolean")
     * @Groups("user_browse")
     * @Groups("user_read")
     */
    private $isUserActive;

    /**
     * @ORM\Column(type="boolean")
     * @Groups("user_browse")
     * @Groups("user_read")
     */
    private $showTuto;

    /**
     * @ORM\Column(type="boolean")
     * @Groups("user_browse")
     * @Groups("user_read")
     */
    private $isProfileCompleted;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("user_browse")
     * @Groups("user_read")
     */
    private $profileImage;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups("user_browse")
     * @Groups("user_read")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("user_browse")
     * @Groups("user_read")
     */
    private $resume;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("user_browse")
     * @Groups("user_read")
     */
    private $linkedin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("user_browse")
     * @Groups("user_read")
     */
    private $github;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups("user_browse")
     * @Groups("user_read")
     */
    private $lastConnected;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=Skill::class)
     * @Groups("user_browse")
     * @Groups("user_read")
     */
    private $skills;

    /**
     * @ORM\OneToMany(targetEntity=Stage::class, mappedBy="user")
     * @Groups("user_browse")
     * @Groups("user_read")
     */
    private $stages;

    /**
     * @ORM\OneToMany(targetEntity=MyMatch::class, mappedBy="sender")
     */
    private $matchesFromMe;

    /**
     * @ORM\OneToMany(targetEntity=MyMatch::class, mappedBy="receiver")
     */
    private $matchesToMe;


    public function __construct()
    {
        $this->isProfileCompleted = false;
        $this->isUserActive = true;
        $this->showTuto = true;
        $this->createdAt = new DateTime("now");
        $this->skills = new ArrayCollection();
        $this->stages = new ArrayCollection();
        $this->matchesFromMe = new ArrayCollection();
        $this->matchesToMe = new ArrayCollection();
    }

    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate(): void
    {
        $this->updatedAt = new \DateTime();
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
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
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
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(?string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPostCode(): ?int
    {
        return $this->postCode;
    }

    public function setPostCode(int $postCode): self
    {
        $this->postCode = $postCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function isIsUserActive(): ?bool
    {
        return $this->isUserActive;
    }

    public function setIsUserActive(bool $isUserActive): self
    {
        $this->isUserActive = $isUserActive;

        return $this;
    }

    public function isShowTuto(): ?bool
    {
        return $this->showTuto;
    }

    public function setShowTuto(bool $showTuto): self
    {
        $this->showTuto = $showTuto;

        return $this;
    }

    public function isIsProfileCompleted(): ?bool
    {
        return $this->isProfileCompleted;
    }

    public function setIsProfileCompleted(bool $isProfileCompleted): self
    {
        $this->isProfileCompleted = $isProfileCompleted;

        return $this;
    }

    public function getProfileImage(): ?string
    {
        return $this->profileImage;
    }

    public function setProfileImage(string $profileImage): self
    {
        $this->profileImage = $profileImage;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    public function getGithub(): ?string
    {
        return $this->github;
    }

    public function setGithub(?string $github): self
    {
        $this->github = $github;

        return $this;
    }

    public function getLastConnected(): ?\DateTimeInterface
    {
        return $this->lastConnected;
    }

    public function setLastConnected(\DateTimeInterface $lastConnected): self
    {
        $this->lastConnected = $lastConnected;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Skill>
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills[] = $skill;
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        $this->skills->removeElement($skill);

        return $this;
    }

    /**
     * @return Collection<int, Stage>
     */
    public function getStages(): Collection
    {
        return $this->stages;
    }

    public function addStage(Stage $stage): self
    {
        if (!$this->stages->contains($stage)) {
            $this->stages[] = $stage;
            $stage->setUser($this);
        }

        return $this;
    }

    public function removeStage(Stage $stage): self
    {
        if ($this->stages->removeElement($stage)) {
            // set the owning side to null (unless already changed)
            if ($stage->getUser() === $this) {
                $stage->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MyMatch>
     */
    public function getMatchesFromMe(): Collection
    {
        return $this->matchesFromMe;
    }

    public function addMatchesFromMe(MyMatch $matchesFromMe): self
    {
        if (!$this->matchesFromMe->contains($matchesFromMe)) {
            $this->matchesFromMe[] = $matchesFromMe;
            $matchesFromMe->setSender($this);
        }

        return $this;
    }

    public function removeMatchesFromMe(MyMatch $matchesFromMe): self
    {
        if ($this->matchesFromMe->removeElement($matchesFromMe)) {
            // set the owning side to null (unless already changed)
            if ($matchesFromMe->getSender() === $this) {
                $matchesFromMe->setSender(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MyMatch>
     */
    public function getMatchesToMe(): Collection
    {
        return $this->matchesToMe;
    }

    public function addMatchesToMe(MyMatch $matchesToMe): self
    {
        if (!$this->matchesToMe->contains($matchesToMe)) {
            $this->matchesToMe[] = $matchesToMe;
            $matchesToMe->setReceiver($this);
        }

        return $this;
    }

    public function removeMatchesToMe(MyMatch $matchesToMe): self
    {
        if ($this->matchesToMe->removeElement($matchesToMe)) {
            // set the owning side to null (unless already changed)
            if ($matchesToMe->getReceiver() === $this) {
                $matchesToMe->setReceiver(null);
            }
        }

        return $this;
    }
}
