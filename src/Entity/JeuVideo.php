<?php

namespace App\Entity;

use App\Repository\JeuVideoRepository;
use App\Entity\Genre;
use App\Entity\Plateforme;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $date_de_sortie = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: Genre::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinTable(name: 'jeux_genres')]
    private Collection $genres;

    #[ORM\ManyToMany(targetEntity: Plateforme::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinTable(name: 'jeux_platforms')]
    private Collection $plateformes;

    #[ORM\Column(nullable: true)]
    private ?float $evaluation = null;

    #[ORM\Column(nullable: true)]
    private ?bool $mode_multijoueur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $versions = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cover_image_url = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type = null;

    public function __construct()
    {
        $this->genres = new ArrayCollection();
        $this->plateformes = new ArrayCollection();
    }

    // Getters et setters existants...

    public function getGenres(): Collection
    {
        return $this->genres;
    }

    public function addGenre(Genre $genre): self
    {
        if (!$this->genres->contains($genre)) {
            $this->genres->add($genre);
        }

        return $this;
    }

    public function removeGenre(Genre $genre): self
    {
        $this->genres->removeElement($genre);

        return $this;
    }

    public function getPlateformes(): Collection
    {
        return $this->plateformes;
    }

    public function addPlateforme(Plateforme $plateforme): self
    {
        if (!$this->plateformes->contains($plateforme)) {
            $this->plateformes->add($plateforme);
        }

        return $this;
    }

    public function removePlateforme(Plateforme $plateforme): self
    {
        $this->plateformes->removeElement($plateforme);

        return $this;
    }

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
