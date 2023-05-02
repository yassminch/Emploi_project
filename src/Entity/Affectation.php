<?php

namespace App\Entity;

use App\Repository\AffectationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AffectationRepository::class)]
class Affectation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Semain::class, inversedBy: 'affectations')]
    private Collection $semain;

    #[ORM\OneToMany(mappedBy: 'affectation', targetEntity: Matiere::class)]
    private Collection $matiere;

    #[ORM\OneToMany(mappedBy: 'affectation', targetEntity: Jour::class)]
    private Collection $jour;

    #[ORM\OneToMany(mappedBy: 'affectation', targetEntity: Seance::class)]
    private Collection $seance;

    #[ORM\OneToMany(mappedBy: 'affectation', targetEntity: Salle::class)]
    private Collection $salle;

    public function __construct()
    {
        $this->semain = new ArrayCollection();
        $this->matiere = new ArrayCollection();
        $this->jour = new ArrayCollection();
        $this->seance = new ArrayCollection();
        $this->salle = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Semain>
     */
    public function getSemain(): Collection
    {
        return $this->semain;
    }

    public function addSemain(Semain $semain): self
    {
        if (!$this->semain->contains($semain)) {
            $this->semain->add($semain);
        }

        return $this;
    }

    public function removeSemain(Semain $semain): self
    {
        $this->semain->removeElement($semain);

        return $this;
    }

    /**
     * @return Collection<int, Matiere>
     */
    public function getMatiere(): Collection
    {
        return $this->matiere;
    }

    public function addMatiere(Matiere $matiere): self
    {
        if (!$this->matiere->contains($matiere)) {
            $this->matiere->add($matiere);
            $matiere->setAffectation($this);
        }

        return $this;
    }

    public function removeMatiere(Matiere $matiere): self
    {
        if ($this->matiere->removeElement($matiere)) {
            // set the owning side to null (unless already changed)
            if ($matiere->getAffectation() === $this) {
                $matiere->setAffectation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Jour>
     */
    public function getJour(): Collection
    {
        return $this->jour;
    }

    public function addJour(Jour $jour): self
    {
        if (!$this->jour->contains($jour)) {
            $this->jour->add($jour);
            $jour->setAffectation($this);
        }

        return $this;
    }

    public function removeJour(Jour $jour): self
    {
        if ($this->jour->removeElement($jour)) {
            // set the owning side to null (unless already changed)
            if ($jour->getAffectation() === $this) {
                $jour->setAffectation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Seance>
     */
    public function getSeance(): Collection
    {
        return $this->seance;
    }

    public function addSeance(Seance $seance): self
    {
        if (!$this->seance->contains($seance)) {
            $this->seance->add($seance);
            $seance->setAffectation($this);
        }

        return $this;
    }

    public function removeSeance(Seance $seance): self
    {
        if ($this->seance->removeElement($seance)) {
            // set the owning side to null (unless already changed)
            if ($seance->getAffectation() === $this) {
                $seance->setAffectation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Salle>
     */
    public function getSalle(): Collection
    {
        return $this->salle;
    }

    public function addSalle(Salle $salle): self
    {
        if (!$this->salle->contains($salle)) {
            $this->salle->add($salle);
            $salle->setAffectation($this);
        }

        return $this;
    }

    public function removeSalle(Salle $salle): self
    {
        if ($this->salle->removeElement($salle)) {
            // set the owning side to null (unless already changed)
            if ($salle->getAffectation() === $this) {
                $salle->setAffectation(null);
            }
        }

        return $this;
    }
}
