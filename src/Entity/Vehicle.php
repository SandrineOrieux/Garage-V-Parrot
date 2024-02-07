<?php

namespace App\Entity;

use App\Repository\VehicleRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;

#[ORM\Entity(repositoryClass: VehicleRepository::class)]
class Vehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?DateTime $year = null;

    #[ORM\Column]
    private ?int $kilometer = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'vehicles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $createdBy = null;

    #[ORM\ManyToOne(inversedBy: 'vehicles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeOfVehicles $type = null;

    #[ORM\ManyToOne(inversedBy: 'vehicles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Brand $brand = null;

    #[ORM\ManyToOne(inversedBy: 'vehicles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Model $model = null;

    #[ORM\ManyToOne(inversedBy: 'vehicles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Energy $energy = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Transmission $transmission = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?NumberOfDoors $numberOfDoors = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?NumberOfSeats $numberOfSeats = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Power $power = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?FiscalPower $fiscalPower = null;

    #[ORM\OneToMany(mappedBy: 'vehicle', targetEntity: ImagesVehicle::class, orphanRemoval: true, cascade: ["persist", "remove", "refresh", "merge"])]
    private Collection $images;

    #[ORM\ManyToMany(targetEntity: Option::class, inversedBy: 'vehicles')]
    private Collection $options;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->options = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getYear(): ?DateTime
    {
        return $this->year;
    }

    public function setYear(DateTime $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getKilometer(): ?int
    {
        return $this->kilometer;
    }

    public function setKilometer(int $kilometer): static
    {
        $this->kilometer = $kilometer;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

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

    public function getType(): ?TypeOfVehicles
    {
        return $this->type;
    }

    public function setType(?TypeOfVehicles $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function setModel(?Model $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getEnergy(): ?Energy
    {
        return $this->energy;
    }

    public function setEnergy(?Energy $energy): static
    {
        $this->energy = $energy;

        return $this;
    }

    public function getTransmission(): ?Transmission
    {
        return $this->transmission;
    }

    public function setTransmission(?Transmission $transmission): static
    {
        $this->transmission = $transmission;

        return $this;
    }

    public function getNumberOfDoors(): ?NumberOfDoors
    {
        return $this->numberOfDoors;
    }

    public function setNumberOfDoors(?NumberOfDoors $numberOfDoors): static
    {
        $this->numberOfDoors = $numberOfDoors;

        return $this;
    }

    public function getNumberOfSeats(): ?NumberOfSeats
    {
        return $this->numberOfSeats;
    }

    public function setNumberOfSeats(?NumberOfSeats $numberOfSeats): static
    {
        $this->numberOfSeats = $numberOfSeats;

        return $this;
    }

    public function getPower(): ?Power
    {
        return $this->power;
    }

    public function setPower(?Power $power): static
    {
        $this->power = $power;

        return $this;
    }

    public function getFiscalPower(): ?FiscalPower
    {
        return $this->fiscalPower;
    }

    public function setFiscalPower(?FiscalPower $fiscalPower): static
    {
        $this->fiscalPower = $fiscalPower;

        return $this;
    }

    /**
     * @return Collection<int, ImagesVehicle>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(ImagesVehicle $image): static
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setVehicle($this);
        }

        return $this;
    }

    public function removeImage(ImagesVehicle $image): static
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getVehicle() === $this) {
                $image->setVehicle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Option>
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(Option $option): static
    {
        if (!$this->options->contains($option)) {
            $this->options->add($option);
        }

        return $this;
    }

    public function removeOption(Option $option): static
    {
        $this->options->removeElement($option);

        return $this;
    }
}
