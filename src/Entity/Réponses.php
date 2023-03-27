<?php

namespace App\Entity;

use App\Repository\RéponsesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RéponsesRepository::class)]
class Réponses
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $container = null;

    #[ORM\ManyToOne(inversedBy: 'rPonses')]
    private ?Annonces $annonce = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getcontainer(): ?string
    {
        return $this->container;
    }

    public function setcontainer(string $container): self
    {
        $this->container = $container;

        return $this;
    }

    public function getAnnonceId(): ?Annonces
    {
        return $this->annonce;
    }

    public function setAnnonceId(?Annonces $annonce): self
    {
        $this->annonce = $annonce;

        return $this;
    }
}
