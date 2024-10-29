<?php

namespace App\Entity;

use App\Repository\FabricantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FabricantRepository::class)]
class Fabricant
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

    /**
     * @var Collection<int, Plateforme>
     */
    #[ORM\OneToMany(targetEntity: Plateforme::class, mappedBy: 'fabricant_id', orphanRemoval: true)]
    private Collection $plateformes;

    public function __construct()
    {
        $this->plateformes = new ArrayCollection();
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

    /**
     * @return Collection<int, Plateforme>
     */
    public function getPlateformes(): Collection
    {
        return $this->plateformes;
    }

    public function addPlateforme(Plateforme $plateforme): static
    {
        if (!$this->plateformes->contains($plateforme)) {
            $this->plateformes->add($plateforme);
            $plateforme->setFabricantId($this);
        }

        return $this;
    }

    public function removePlateforme(Plateforme $plateforme): static
    {
        if ($this->plateformes->removeElement($plateforme)) {
            // set the owning side to null (unless already changed)
            if ($plateforme->getFabricantId() === $this) {
                $plateforme->setFabricantId(null);
            }
        }

        return $this;
    }
}
