<?php

namespace App\Entity;

use App\Repository\SdfRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SdfRepository::class)
 */
class Sdf
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $titulo;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $duracion;

    /**
     * @ORM\OneToOne(targetEntity=OfertaEducativa::class, mappedBy="sdf", cascade={"persist", "remove"})
     */
    private $ofertaEducativa;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(?string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getDuracion(): ?string
    {
        return $this->duracion;
    }

    public function setDuracion(string $duracion): self
    {
        $this->duracion = $duracion;

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
            $this->ofertaEducativa->setSdf(null);
        }

        // set the owning side of the relation if necessary
        if ($ofertaEducativa !== null && $ofertaEducativa->getSdf() !== $this) {
            $ofertaEducativa->setSdf($this);
        }

        $this->ofertaEducativa = $ofertaEducativa;

        return $this;
    }
}
