<?php

namespace App\Entity;

use App\Repository\CarreraFDRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarreraFDRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class CarreraFD {

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
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $duracion;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $comentario;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creado;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $actualizado;

    /**
     * @ORM\ManyToOne(targetEntity=TipoFormacion::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $tipoFormacion;

    public function __toString() {
        return substr($this->nombre, 0, 60);
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

    public function setDuracion(?string $duracion): self {
        $this->duracion = $duracion;

        return $this;
    }

    public function getComentario(): ?string {
        return $this->comentario;
    }

    public function setComentario(?string $comentario): self {
        $this->comentario = $comentario;

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

    public function getTipoFormacion(): ?TipoFormacion {
        return $this->tipoFormacion;
    }

    public function setTipoFormacion(?TipoFormacion $tipoFormacion): self {
        $this->tipoFormacion = $tipoFormacion;

        return $this;
    }

}
