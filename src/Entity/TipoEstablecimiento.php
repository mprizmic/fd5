<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TipoEstablecimiento
 *
 * @ORM\Table(name="tipo_establecimiento")
 * @ORM\Entity(repositoryClass="App\Repository\TipoEstablecimientoRepository")
 */
class TipoEstablecimiento
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="codigo", type="string", length=5, nullable=true)
     */
    private $codigo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="string", length=50, nullable=true)
     */
    private $descripcion;

    /**
     * @var int
     *
     * @ORM\Column(name="orden", type="integer", nullable=false)
     */
    private $orden;

    /**
     * @ORM\OneToMany(targetEntity=Establecimiento::class, mappedBy="tipoEstablecimiento")
     */
    private $establecimientos;

    public function __construct()
    {
        $this->establecimientos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getOrden(): ?int
    {
        return $this->orden;
    }

    public function setOrden(int $orden): self
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * @return Collection<int, Establecimiento>
     */
    public function getEstablecimientos(): Collection
    {
        return $this->establecimientos;
    }

    public function addEstablecimiento(Establecimiento $establecimiento): self
    {
        if (!$this->establecimientos->contains($establecimiento)) {
            $this->establecimientos[] = $establecimiento;
            $establecimiento->setTipoEstablecimiento($this);
        }

        return $this;
    }

    public function removeEstablecimiento(Establecimiento $establecimiento): self
    {
        if ($this->establecimientos->removeElement($establecimiento)) {
            // set the owning side to null (unless already changed)
            if ($establecimiento->getTipoEstablecimiento() === $this) {
                $establecimiento->setTipoEstablecimiento(null);
            }
        }

        return $this;
    }


}
