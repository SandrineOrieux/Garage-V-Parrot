<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: "Ce champ est requis")]
    #[Assert\Regex('/^(?!\s*--|\s*\/\*|\s*\*|\s*#).*$/', message: "Votre prénom ne peut contenir certains caractères spéciaux")]

    private ?string $firstname = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: "Ce champ est requis")]
    #[Assert\Regex('/^(?!\s*--|\s*\/\*|\s*\*|\s*#).*$/', message: "Votre nom ne peut contenir certains caractères spéciaux")]

    private ?string $lastname = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: "Ce champ est requis")]
    #[Assert\Regex('/^(?!\s*--|\s*\/\*|\s*\*|\s*#).*$/', message: "Votre message ne peut contenir certains caractères spéciaux")]

    private ?string $message = null;
    #[Assert\Regex('/^(?!\s*--|\s*\/\*|\s*\*|\s*#).*$/', message: "Votre email ne peut contenir certains caractères spéciaux")]
    #[Assert\Email(message: 'Ce n\'est pas une adresse mail valide')]
    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Ce champ est requis")]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Ce champ est requis")]
    #[Assert\Regex('/^(?!\s*--|\s*\/\*|\s*\*|\s*#).*$/', message: "l'objet ne peut contenir certains caractères spéciaux")]


    private ?string $object = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Ce champ est requis")]
    #[Assert\Regex('/[0-9]/', message: "Votre téléphone ne peut contenir que des nombres sans espace")]
    #[Assert\Length(min: 10, max: 15, minMessage: "Ce champs doit contenir minimum {{ limit }} caractèrtes", maxMessage: "Ce champs doit contenir maximun {{ limit }} caractèrtes")]

    private ?string $phone = null;

    #[ORM\Column]
    private ?bool $isContacted = null;

    #[ORM\ManyToOne(inversedBy: 'contacts')]
    private ?User $employee = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function isIsContacted(): ?bool
    {
        return $this->isContacted;
    }

    public function setIsContacted(bool $isContacted): static
    {
        $this->isContacted = $isContacted;

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

    public function getObject(): ?string
    {
        return $this->object;
    }

    public function setObject(string $object): static
    {
        $this->object = $object;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }
}
