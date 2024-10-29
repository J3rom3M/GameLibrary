<?php

namespace App\Entity;

use App\Repository\EditeurRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EditeurRepository::class)]
class Editeur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pays = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $annee_de_creation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(?string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getAnneeDeCreation(): ?\DateTimeInterface
    {
        return $this->annee_de_creation;
    }

    public function setAnneeDeCreation(?\DateTimeInterface $annee_de_creation): static
    {
        $this->annee_de_creation = $annee_de_creation;

        return $this;
    }
}
