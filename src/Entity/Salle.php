<?php

namespace App\Entity;

use App\Repository\SalleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalleRepository::class)]
class Salle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $vidproj = null;

    #[ORM\ManyToOne(inversedBy: 'salle')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Bloc $bloc = null;

    #[ORM\ManyToOne(inversedBy: 'salle')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Affectation $affectation = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isVidproj(): ?bool
    {
        return $this->vidproj;
    }

    public function setVidproj(?bool $vidproj): self
    {
        $this->vidproj = $vidproj;

        return $this;
    }

    public function getBloc(): ?Bloc
    {
        return $this->bloc;
    }

    public function setBloc(?Bloc $bloc): self
    {
        $this->bloc = $bloc;

        return $this;
    }

    public function getAffectation(): ?Affectation
    {
        return $this->affectation;
    }

    public function setAffectation(?Affectation $affectation): self
    {
        $this->affectation = $affectation;

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
}
