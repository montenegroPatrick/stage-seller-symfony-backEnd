<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=SkillRepository::class)
 */
class Skill
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("user_browse")
     * @Groups("user_read")
     * @Groups("stage_read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     * @Groups("user_browse")
     * @Groups("user_read")
     * @Groups("stage_read")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=20)
     * @Groups("user_browse")
     * @Groups("user_read")
     * @Groups("stage_read")
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
