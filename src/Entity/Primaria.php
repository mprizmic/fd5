<?php

namespace App\Entity;

use App\Repository\PrimariaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrimariaRepository::class)
 */
class Primaria
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $duracion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\OneToOne(targetEntity=OfertaEducativa::class, mappedBy="primaria", cascade={"persist", "remove"})
     */
    private $ofertaEducativa;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDuracion(): ?string
    {
        return $this->duracion;
    }

    public function setDuracion(?string $duracion): self
    {
        $this->duracion = $duracion;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getOfertaEducativa(): ?OfertaEducativa
    {
        return $this->ofertaEducativa;
    }

    public function setOfertaEducativa(?OfertaEducativa $ofertaEducativa): self
    {
        // unset the owning side of the relation if necessary
        if ($ofertaEducativa === null && $this->ofertaEducativa !== null) {
            $this->ofertaEducativa->setPrimaria(null);
        }

        // set the owning side of the relation if necessary
        if ($ofertaEducativa !== null && $ofertaEducativa->getPrimaria() !== $this) {
            $ofertaEducativa->setPrimaria($this);
        }

        $this->ofertaEducativa = $ofertaEducativa;

        return $this;
    }
}
