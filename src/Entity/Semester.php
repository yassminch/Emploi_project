<?php

namespace App\Entity;

use App\Repository\SemesterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SemesterRepository::class)]
class Semester
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'semester', targetEntity: Semain::class)]
    private Collection $semain;

    public function __construct()
    {
        $this->semain = new ArrayCollection();
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
            $semain->setSemester($this);
        }

        return $this;
    }

    public function removeSemain(Semain $semain): self
    {
        if ($this->semain->removeElement($semain)) {
            // set the owning side to null (unless already changed)
            if ($semain->getSemester() === $this) {
                $semain->setSemester(null);
            }
        }

        return $this;
    }
}
