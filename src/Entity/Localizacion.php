<?php

namespace App\Entity;

use App\Repository\LocalizacionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocalizacionRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Localizacion {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $actualizado;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creado;

    /**
     * @ORM\ManyToOne(targetEntity=UnidadEducativa::class, inversedBy="localizaciones")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unidadEducativa;

    /**
     * @ORM\ManyToOne(targetEntity=EstablecimientoEdificio::class, inversedBy="localizaciones")
     */
    private $establecimientoEdificio;

    /**
     * @ORM\OneToMany(targetEntity=DomicilioLocalizacion::class, mappedBy="localizacion")
     */
    private $domicilioLocalizaciones;

    public function __construct() {
        $this->domicilioLocalizacions = new ArrayCollection();
    }

    public function __toString() {
        return 'LOCALIZACION';
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

    public function getActualizado(): ?\DateTimeInterface {
        return $this->actualizado;
    }

    public function setActualizado(?\DateTimeInterface $actualizado): self {
        $this->actualizado = $actualizado;

        return $this;
    }

    public function getCreado(): ?\DateTimeInterface {
        return $this->creado;
    }

    public function setCreado(\DateTimeInterface $creado): self {
        $this->creado = $creado;

        return $this;
    }

    public function getUnidadEducativa(): ?UnidadEducativa {
        return $this->unidadEducativa;
    }

    public function setUnidadEducativa(?UnidadEducativa $unidadEducativa): self {
        $this->unidadEducativa = $unidadEducativa;

        return $this;
    }

    public function getEstablecimientoEdificio(): ?EstablecimientoEdificio {
        return $this->establecimientoEdificio;
    }

    public function setEstablecimientoEdificio(?EstablecimientoEdificio $establecimientoEdificio): self {
        $this->establecimientoEdificio = $establecimientoEdificio;

        return $this;
    }

    public function getDomicilio(): ?Domicilio {
        return $this->domicilio;
    }

    public function setDomicilio(?Domicilio $domicilio): self {
        $this->domicilio = $domicilio;

        return $this;
    }

    /**
     * @return Collection<int, DomicilioLocalizacion>
     */
    public function getDomicilioLocalizaciones(): Collection {
        return $this->domicilioLocalizaciones;
    }

    public function addDomicilioLocalizacion(DomicilioLocalizacion $domicilioLocalizacion): self {
        if (!$this->domicilioLocalizaciones->contains($domicilioLocalizacion)) {
            $this->domicilioLocalizaciones[] = $domicilioLocalizacion;
            $domicilioLocalizacion->setLocalizacion($this);
        }

        return $this;
    }

    public function removeDomicilioLocalizacion(DomicilioLocalizacion $domicilioLocalizacion): self {
        if ($this->domicilioLocalizaciones->removeElement($domicilioLocalizacion)) {
            // set the owning side to null (unless already changed)
            if ($domicilioLocalizacion->getLocalizacion() === $this) {
                $domicilioLocalizacion->setLocalizacion(null);
            }
        }

        return $this;
    }

}
