<?php

namespace App\Entity;

use App\Repository\DomicilioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DomicilioRepository::class)
 */
class Domicilio {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $calle;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $altura;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $principal;

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private $c_postal;

    /**
     * @ORM\ManyToOne(targetEntity=Edificio::class, inversedBy="domicilios")
     */
    private $edificio;

    /**
     * @ORM\OneToMany(targetEntity=DomicilioLocalizacion::class, mappedBy="domicilio")
     */
    private $domicilioLocalizaciones;

    public function __construct()
    {
        $this->localizaciones = new ArrayCollection();
        $this->domicilioLocalizaciones = new ArrayCollection();
    }

    public function getCompleto() {
        return $this->getCalle() . ' ' . $this->getAltura() .
                ($this->getCPostal() ? ' - CP: ' . $this->getCPostal() : '');
    }

    public function __toString() {
        return $this->getCalle() . ' ' . $this->getAltura();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getCalle(): ?string {
        return $this->calle;
    }

    public function setCalle(string $calle): self {
        $this->calle = $calle;

        return $this;
    }

    public function getAltura(): ?string {
        return $this->altura;
    }

    public function setAltura(string $altura): self {
        $this->altura = $altura;

        return $this;
    }

    public function getPrincipal(): ?bool {
        return $this->principal;
    }

    public function setPrincipal(?bool $principal): self {
        $this->principal = $principal;

        return $this;
    }

    public function getCPostal(): ?string {
        return $this->c_postal;
    }

    public function setCPostal(?string $c_postal): self {
        $this->c_postal = $c_postal;

        return $this;
    }

    public function getEdificio(): ?Edificio {
        return $this->edificio;
    }

    public function setEdificio(?Edificio $edificio): self {
        $this->edificio = $edificio;

        return $this;
    }

    /**
     * @return Collection<int, Localizacion>
     */
    public function getLocalizaciones(): Collection
    {
        return $this->localizaciones;
    }

    public function addLocalizacione(Localizacion $localizacione): self
    {
        if (!$this->localizaciones->contains($localizacione)) {
            $this->localizaciones[] = $localizacione;
            $localizacione->setDomicilio($this);
        }

        return $this;
    }

    public function removeLocalizacione(Localizacion $localizacione): self
    {
        if ($this->localizaciones->removeElement($localizacione)) {
            // set the owning side to null (unless already changed)
            if ($localizacione->getDomicilio() === $this) {
                $localizacione->setDomicilio(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, DomicilioLocalizacion>
     */
    public function getDomicilioLocalizaciones(): Collection
    {
        return $this->domicilioLocalizaciones;
    }

    public function addDomicilioLocalizacion(DomicilioLocalizacion $domicilioLocalizacion): self
    {
        if (!$this->domicilioLocalizaciones->contains($domicilioLocalizacion)) {
            $this->domicilioLocalizaciones[] = $domicilioLocalizacion;
            $domicilioLocalizacion->setDomicilio($this);
        }

        return $this;
    }

    public function removeDomicilioLocalizacion(DomicilioLocalizacion $domicilioLocalizacion): self
    {
        if ($this->domicilioLocalizaciones->removeElement($domicilioLocalizacion)) {
            // set the owning side to null (unless already changed)
            if ($domicilioLocalizacion->getDomicilio() === $this) {
                $domicilioLocalizacion->setDomicilio(null);
            }
        }

        return $this;
    }

}
