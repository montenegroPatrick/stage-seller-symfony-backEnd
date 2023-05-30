<?php

namespace App\Entity;

use App\Repository\StageRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=StageRepository::class)
 */
class Stage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("user_read")
     * @Groups("stage_read")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Length(min=4, minMessage="Description must be at least {{ limit }} characters long")
     * @Groups("user_browse")
     * @Groups("user_read")
     * @Groups("stage_read")
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Groups("user_browse")
     * @Groups("user_read")
     * @Groups("stage_read")
     */
    private $startDate;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Groups("user_browse")
     * @Groups("user_read")
     * @Groups("stage_read")
     */
    private $duration;

    /**
     * @ORM\Column(type="string", length=64)
     * @Assert\NotBlank
     * @Groups("user_browse")
     * @Groups("user_read")
     * @Groups("stage_read")
     */
    private $location;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\NotNull
     * @Groups("user_browse")
     * @Groups("user_read")
     * @Groups("stage_read")
     */
    private $isRemoteFriendly;

    //!Not\Blank validation sent if bool = false...
    /**
     * @ORM\Column(type="boolean")
     * @Assert\NotNull
     * @Groups("user_browse")
     * @Groups("user_read")
     * @Groups("stage_read")
     */
    private $isTravelFriendly;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    //!TODO REQUIRE SKILLS!!!!
    /**
     * @ORM\ManyToMany(targetEntity=Skill::class)
     * @Assert\Count(min=1, minMessage="You must at least add one skill")
     * @Groups("user_read")
     * @Groups("stage_read")
     * @Groups("user_browse")
     */
    private $skills;
    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="stages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
        $this->createdAt = new DateTime("now");
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function isIsRemoteFriendly(): ?bool
    {
        return $this->isRemoteFriendly;
    }

    public function setIsRemoteFriendly(bool $isRemoteFriendly): self
    {
        $this->isRemoteFriendly = $isRemoteFriendly;

        return $this;
    }

    public function isIsTravelFriendly(): ?bool
    {
        return $this->isTravelFriendly;
    }

    public function setIsTravelFriendly(bool $isTravelFriendly): self
    {
        $this->isTravelFriendly = $isTravelFriendly;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
