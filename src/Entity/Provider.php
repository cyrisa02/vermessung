<?php

namespace App\Entity;

use App\Repository\ProviderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProviderRepository::class)]
class Provider
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 190)]
    private ?string $company = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $lastname = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $firstname = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 190)]
    private ?string $email = null;

    #[ORM\Column(length: 190)]
    private ?string $address = null;

    #[ORM\Column(length: 190)]
    private ?string $zipcode = null;

    #[ORM\Column(length: 190)]
    private ?string $city = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $phone = null;

    #[ORM\OneToMany(mappedBy: 'providers', targetEntity: Measure::class)]
    private Collection $measures;

    
    public function __toString()
     {
       return $this->company;
     }

    public function __construct()
    {
        $this->measures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): self
    {
        $this->zipcode = $zipcode;

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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return Collection<int, Measure>
     */
    public function getMeasures(): Collection
    {
        return $this->measures;
    }

    public function addMeasure(Measure $measure): self
    {
        if (!$this->measures->contains($measure)) {
            $this->measures->add($measure);
            $measure->setProviders($this);
        }

        return $this;
    }

    public function removeMeasure(Measure $measure): self
    {
        if ($this->measures->removeElement($measure)) {
            // set the owning side to null (unless already changed)
            if ($measure->getProviders() === $this) {
                $measure->setProviders(null);
            }
        }

        return $this;
    }

    
}