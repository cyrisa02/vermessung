<?php

namespace App\Entity;

use App\Repository\MeasureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MeasureRepository::class)]
class Measure
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 190)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $picture = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $place = null;

    #[ORM\Column]
    private ?int $width = null;

    #[ORM\Column]
    private ?int $length = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\ManyToOne(inversedBy: 'measures')]
    private ?User $user = null;

    
    #[ORM\Column(length: 190, nullable: true)]
    private ?string $floorname = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $floornr = null;

    #[ORM\Column(length: 190)]
    private ?string $lastname = null;

    #[ORM\Column(length: 190)]
    private ?string $civility = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $address = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $zipcode = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $phone = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Quotation $quotation = null;

    #[ORM\ManyToOne(inversedBy: 'measures')]
    private ?Provider $providers = null;

    

    
    public function __toString()
     {
       return $this->title;
     }


    /**
 	*This constructor is for the date
 	*/
 	
 	public function __construct()
    {
        $this->created_at = new \DateTimeImmutable();
           
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(?string $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getLength(): ?int
    {
        return $this->length;
    }

    public function setLength(int $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

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

    
    public function getFloorname(): ?string
    {
        return $this->floorname;
    }

    public function setFloorname(?string $floorname): self
    {
        $this->floorname = $floorname;

        return $this;
    }

    public function getFloornr(): ?string
    {
        return $this->floornr;
    }

    public function setFloornr(?string $floornr): self
    {
        $this->floornr = $floornr;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getCivility(): ?string
    {
        return $this->civility;
    }

    public function setCivility(string $civility): self
    {
        $this->civility = $civility;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(?string $zipcode): self
    {
        $this->zipcode = $zipcode;

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

    public function getQuotation(): ?Quotation
    {
        return $this->quotation;
    }

    public function setQuotation(?Quotation $quotation): self
    {
        $this->quotation = $quotation;

        return $this;
    }

    public function getProviders(): ?Provider
    {
        return $this->providers;
    }

    public function setProviders(?Provider $providers): self
    {
        $this->providers = $providers;

        return $this;
    }

    

    
}