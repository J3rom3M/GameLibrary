<?php

namespace App\Entity;

use App\Repository\PlateformeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlateformeRepository::class)]
class Plateforme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_de_sortie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type = null;

    #[ORM\Column(nullable: true)]
    private ?int $generation = null;

    #[ORM\ManyToOne(inversedBy: 'plateformes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Fabricant $fabricant_id = null;

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

    public function getDateDeSortie(): ?\DateTimeInterface
    {
        return $this->date_de_sortie;
    }

    public function setDateDeSortie(?\DateTimeInterface $date_de_sortie): static
    {
        $this->date_de_sortie = $date_de_sortie;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getGeneration(): ?int
    {
        return $this->generation;
    }

    public function setGeneration(?int $generation): static
    {
        $this->generation = $generation;

        return $this;
    }

    public function getFabricantId(): ?Fabricant
    {
        return $this->fabricant_id;
    }

    public function setFabricantId(?Fabricant $fabricant_id): static
    {
        $this->fabricant_id = $fabricant_id;

        return $this;
    }
}
