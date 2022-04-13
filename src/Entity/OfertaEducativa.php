<?php

namespace App\Entity;

use App\Repository\OfertaEducativaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OfertaEducativaRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class OfertaEducativa {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creado;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $actualizado;

    /**
     * @ORM\ManyToOne(targetEntity=TipoOfertaEducativa::class, inversedBy="ofertasEducativas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tipo;

    /**
     * @ORM\OneToOne(targetEntity=Carrera::class, mappedBy="oferta", cascade={"persist", "remove"})
     */
    private $carrera;

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

    public function __toString() {
        return 'Oferta tipo ' . $this->tipo;
    }

    public function getId(): ?int {
        return $this->id;
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

    public function getTipo(): ?TipoOfertaEducativa {
        return $this->tipo;
    }

    public function setTipo(?TipoOfertaEducativa $tipo): self {
        $this->tipo = $tipo;

        return $this;
    }

    public function getCarrera(): ?Carrera {
        return $this->carrera;
    }

    public function setCarrera(Carrera $carrera): self {
        // set the owning side of the relation if necessary
        if ($carrera->getOferta() !== $this) {
            $carrera->setOferta($this);
        }

        $this->carrera = $carrera;

        return $this;
    }

}
