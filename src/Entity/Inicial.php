<?php

namespace App\Entity;

use App\Repository\InicialRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InicialRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Inicial {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $duracion;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $creado;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $actualizado;

    /**
     * @ORM\OneToOne(targetEntity=OfertaEducativa::class, mappedBy="inicial", cascade={"persist", "remove"})
     */
    private $ofertaEducativa;

    public function __toString() {
        return $this->getNombre();
    }

    /**
     * @ORM\PrePersist
     */
    public function updateCreado() {
        $this->creado = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate() {
        $this->actualizado = new \DateTime();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getNombre(): ?string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDuracion(): ?string {
        return $this->duracion;
    }

    public function setDuracion(string $duracion): self {
        $this->duracion = $duracion;

        return $this;
    }

    public function getCreado(): ?\DateTimeInterface {
        return $this->creado;
    }

    public function setCreado(\DateTimeInterface $creado): self {
        $this->creado = $creado;

        return $this;
    }

    public function getActualizado(): ?\DateTimeInterface {
        return $this->actualizado;
    }

    public function setActualizado(?\DateTimeInterface $actualizado): self {
        $this->actualizado = $actualizado;

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
            $this->ofertaEducativa->setInicial(null);
        }

        // set the owning side of the relation if necessary
        if ($ofertaEducativa !== null && $ofertaEducativa->getInicial() !== $this) {
            $ofertaEducativa->setInicial($this);
        }

        $this->ofertaEducativa = $ofertaEducativa;

        return $this;
    }

}
