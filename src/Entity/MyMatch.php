<?php

namespace App\Entity;

use App\Repository\MyMatchRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;



///! each student_id/company_id association must be unique
/**
 * @ORM\Entity(repositoryClass=MyMatchRepository::class)
 * @ORM\Table(name="my_match",
 *    uniqueConstraints={
 *        @ORM\UniqueConstraint(name="unique_match", columns={"sender", "receiver"})
 *    }
 * )
 */
class MyMatch
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("matches")
     * @Groups("user_read")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     * @Groups("matches")
     * @Groups("user_read")
     */
    private $isMutual;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="matchesFromMe")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("matches")
     * @Groups("user_read")
     */
    private $sender;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="matchesToMe")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     * @Groups("matches")
     * @Groups("user_read")
     */
    private $receiver;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    public function __construct()
    {
        $this->isMutual = false;
        $this->createdAt = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isIsMutual(): ?bool
    {
        return $this->isMutual;
    }

    public function setIsMutual(bool $isMutual): self
    {
        $this->isMutual = $isMutual;

        return $this;
    }

    public function getSender(): ?User
    {
        return $this->sender;
    }

    public function setSender(?User $sender): self
    {
        $this->sender = $sender;

        return $this;
    }

    public function getReceiver(): ?User
    {
        return $this->receiver;
    }

    public function setReceiver(?User $receiver): self
    {
        $this->receiver = $receiver;

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
}
