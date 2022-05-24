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
     * @ORM\OneToMany(targetEntity=LocalizacionOE::class, mappedBy="localizacion")
     */
    private $ofertasEducativas;

    public function __construct()
    {
        $this->ofertasEducativas = new ArrayCollection();
    }

    public function __toString() {
        $e = $this->getEstablecimientoEdificio()->getEstablecimiento()->getApodo();
        $ee = $this->getEstablecimientoEdificio()->getCueAnexo();
        return $e . '-' . $ee . '/' . 'Nivel: ' . $this->getUnidadEducativa()->getNivel()->getAbreviatura();
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
     * @return Collection<int, LocalizacionOE>
     */
    public function getOfertasEducativas(): Collection
    {
        return $this->ofertasEducativas;
    }

    public function addOfertasEducativa(LocalizacionOE $ofertasEducativa): self
    {
        if (!$this->ofertasEducativas->contains($ofertasEducativa)) {
            $this->ofertasEducativas[] = $ofertasEducativa;
            $ofertasEducativa->setLocalizacion($this);
        }

        return $this;
    }

    public function removeOfertasEducativa(LocalizacionOE $ofertasEducativa): self
    {
        if ($this->ofertasEducativas->removeElement($ofertasEducativa)) {
            // set the owning side to null (unless already changed)
            if ($ofertasEducativa->getLocalizacion() === $this) {
                $ofertasEducativa->setLocalizacion(null);
            }
        }

        return $this;
    }

}
