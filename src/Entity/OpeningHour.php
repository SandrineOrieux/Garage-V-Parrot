<?php

namespace App\Entity;

use App\Repository\OpeningHourRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpeningHourRepository::class)]
class OpeningHour
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $day = null;

    #[ORM\ManyToOne]
    private ?TimeSlot $am = null;

    #[ORM\ManyToOne]
    private ?TimeSlot $pm = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $createdBy = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): static
    {
        $this->day = $day;

        return $this;
    }

    public function getAm(): ?TimeSlot
    {
        return $this->am;
    }

    public function setAm(?TimeSlot $am): static
    {
        $this->am = $am;

        return $this;
    }

    public function getPm(): ?TimeSlot
    {
        return $this->pm;
    }

    public function setPm(?TimeSlot $pm): static
    {
        $this->pm = $pm;

        return $this;
    }

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): static
    {
        $this->createdBy = $createdBy;

        return $this;
    }
}
