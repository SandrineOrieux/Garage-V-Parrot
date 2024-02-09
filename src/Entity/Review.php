<?php

namespace App\Entity;



use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReviewRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ReviewRepository::class)]
class Review
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank(message: "Ce champ est requis")]
    #[Assert\Length(min: 4, max: 15, minMessage: "Ce champs doit contenir minimum {{ limit }} caractèrtes", maxMessage: "Ce champs doit contenir maximun {{ limit }} caractèrtes")]
    #[Assert\Regex('/^(?!\s*--|\s*\/\*|\s*\*|\s*#).*$/', message: "Votre nom ne peut contenir certains caractères spéciaux")]
    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: "Ce champ est requis")]
    #[Assert\Regex('/^(?!\s*--|\s*\/\*|\s*\*|\s*#).*$/', message: "Votre message ne peut contenir certains caractères spéciaux")]
    private ?string $comment = null;

    #[ORM\Column(type: Types::SMALLINT)]
    #[Assert\Regex('/[1-5]/', message: "La valeur de la note doit être comprise entre 1 et 5.")]
    private ?int $rate = null;

    #[ORM\Column]
    private ?bool $isvalidated = null;

    #[ORM\ManyToOne(inversedBy: 'reviews')]
    private ?User $employee = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getRate(): ?int
    {
        return $this->rate;
    }

    public function setRate(int $rate): static
    {
        $this->rate = $rate;

        return $this;
    }

    public function isIsvalidated(): ?bool
    {
        return $this->isvalidated;
    }

    public function setIsvalidated(bool $isvalidated): static
    {
        $this->isvalidated = $isvalidated;

        return $this;
    }

    public function getEmployee(): ?User
    {
        return $this->employee;
    }

    public function setEmployee(?User $employee): static
    {
        $this->employee = $employee;

        return $this;
    }
}
