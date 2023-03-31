<?php

namespace App\Entity;

use App\Repository\AnnoncesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnoncesRepository::class)]
class Annonces
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 175)]
    private ?string $title = null;

    #[ORM\Column(length: 175)]
    private ?string $type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $container = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateAdd = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateMaxPublication = null;

    #[ORM\Column(length: 175)]
    private ?string $department = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $price = null;

    #[ORM\OneToMany(mappedBy: 'annonce', targetEntity: Réponses::class)]
    private Collection $rPonses;

    public function __construct()
    {
        $this->rPonses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function gettitle(): ?string
    {
        return $this->title;
    }

    public function settitle(string $title): self
    {
        $this->title = $title;

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

    public function getcontainer(): ?string
    {
        return $this->container;
    }

    public function setcontainer(?string $container): self
    {
        $this->container = $container;

        return $this;
    }

    public function getdateAdd(): ?\DateTimeInterface
    {
        return $this->dateAdd;
    }

    public function setdateAdd(\DateTimeInterface $dateAdd): self
    {
        $this->dateAdd = $dateAdd;

        return $this;
    }

    public function getDateMaxPublication(): ?\DateTimeInterface
    {
        return $this->dateMaxPublication;
    }

    public function setDateMaxPublication(\DateTimeInterface $dateMaxPublication): self
    {
        $this->dateMaxPublication = $dateMaxPublication;

        return $this;
    }

    public function getdepartment(): ?string
    {
        return $this->department;
    }

    public function setdepartment(string $department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getprice(): ?string
    {
        return $this->price;
    }

    public function setprice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection<int, Réponses>
     */
    public function getRPonses(): Collection
    {
        return $this->rPonses;
    }

    public function addRPonse(Réponses $rPonse): self
    {
        if (!$this->rPonses->contains($rPonse)) {
            $this->rPonses->add($rPonse);
            $rPonse->setAnnonceId($this);
        }

        return $this;
    }

    public function removeRPonse(Réponses $rPonse): self
    {
        if ($this->rPonses->removeElement($rPonse)) {
            // set the owning side to null (unless already changed)
            if ($rPonse->getAnnonceId() === $this) {
                $rPonse->setAnnonceId(null);
            }
        }

        return $this;
    }

    //teste

    public function toArray(): array
    {
        return [
            'title' => $this->getTitle(),
            'type' => $this->getType(),
            'department' => $this->getDepartment(),
        ];
    }

    public function __toString()
    {
        return $this->id ;
    }

}
