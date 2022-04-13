<?php

namespace App\Entity;

use App\Repository\TipoOfertaEducativaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TipoOfertaEducativaRepository::class)
 */
class TipoOfertaEducativa {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $codigo;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $descripcion;

    /**
     * @ORM\ManyToOne(targetEntity=Nivel::class, inversedBy="tiposOfertasEducativas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nivel;

    /**
     * @ORM\OneToMany(targetEntity=OfertaEducativa::class, mappedBy="tipo")
     */
    private $ofertasEducativas;

    public function __construct() {
        $this->ofertasEducativas = new ArrayCollection();
    }

    public function __toString() {
        return $this->descripcion;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getCodigo(): ?string {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self {
        $this->codigo = $codigo;

        return $this;
    }

    public function getDescripcion(): ?string {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getNivel(): ?Nivel {
        return $this->nivel;
    }

    public function setNivel(?Nivel $nivel): self {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * @return Collection<int, OfertaEducativa>
     */
    public function getOfertasEducativas(): Collection {
        return $this->ofertasEducativas;
    }

    public function addOfertasEducativa(OfertaEducativa $ofertasEducativa): self {
        if (!$this->ofertasEducativas->contains($ofertasEducativa)) {
            $this->ofertasEducativas[] = $ofertasEducativa;
            $ofertasEducativa->setTipo($this);
        }

        return $this;
    }

    public function removeOfertasEducativa(OfertaEducativa $ofertasEducativa): self {
        if ($this->ofertasEducativas->removeElement($ofertasEducativa)) {
            // set the owning side to null (unless already changed)
            if ($ofertasEducativa->getTipo() === $this) {
                $ofertasEducativa->setTipo(null);
            }
        }

        return $this;
    }

}
