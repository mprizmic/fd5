<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * DistritoEscolar
 *
 * @ORM\Table(name="distrito_escolar")
 * @ORM\Entity(repositoryClass="App\Repository\DistritoEscolarRepository")
 */
class DistritoEscolar
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
     * @var int|null
     *
     * @ORM\Column(name="numero", type="integer", nullable=true)
     */
    private $numero;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity=Establecimiento::class, mappedBy="distritoEscolar")
     */
    private $establecimientos;
    
    public function __toString() {
        return $this->getNombre();
    }

    public function __construct()
    {
        $this->establecimientos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(?int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

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
            $establecimiento->setDistritoEscolar($this);
        }

        return $this;
    }

    public function removeEstablecimiento(Establecimiento $establecimiento): self
    {
        if ($this->establecimientos->removeElement($establecimiento)) {
            // set the owning side to null (unless already changed)
            if ($establecimiento->getDistritoEscolar() === $this) {
                $establecimiento->setDistritoEscolar(null);
            }
        }

        return $this;
    }


}
