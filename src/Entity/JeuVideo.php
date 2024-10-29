<?php

namespace App\Entity;

use App\Repository\JeuVideoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JeuVideoRepository::class)]
class JeuVideo
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
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $genres = null;

    #[ORM\Column(nullable: true)]
    private ?float $evaluation = null;

    #[ORM\Column(nullable: true)]
    private ?bool $mode_multijoueur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $plateformes = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $versions = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cover_image_url = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getGenres(): ?string
    {
        return $this->genres;
    }

    public function setGenres(string $genres): static
    {
        $this->genres = $genres;

        return $this;
    }

    public function getEvaluation(): ?float
    {
        return $this->evaluation;
    }

    public function setEvaluation(?float $evaluation): static
    {
        $this->evaluation = $evaluation;

        return $this;
    }

    public function isModeMultijoueur(): ?bool
    {
        return $this->mode_multijoueur;
    }

    public function setModeMultijoueur(?bool $mode_multijoueur): static
    {
        $this->mode_multijoueur = $mode_multijoueur;

        return $this;
    }

    public function getPlateformes(): ?string
    {
        return $this->plateformes;
    }

    public function setPlateformes(?string $plateformes): static
    {
        $this->plateformes = $plateformes;

        return $this;
    }

    public function getVersions(): ?string
    {
        return $this->versions;
    }

    public function setVersions(?string $versions): static
    {
        $this->versions = $versions;

        return $this;
    }

    public function getCoverImageUrl(): ?string
    {
        return $this->cover_image_url;
    }

    public function setCoverImageUrl(?string $cover_image_url): static
    {
        $this->cover_image_url = $cover_image_url;

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
}
