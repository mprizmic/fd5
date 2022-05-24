<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * App\Entity\Nivel
 *
 * @ORM\Table(name="nivel")
 * @ORM\Entity(repositoryClass="App\Repository\NivelRepository")
 */
class Nivel {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $nombre
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */
    private $nombre;

    /**
     * @var string $abreviatura
     *
     * @ORM\Column(name="abreviatura", type="string", length=5, nullable=true)
     */
    private $abreviatura;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $orden;

    /**
     * @ORM\OneToMany(targetEntity=TipoOfertaEducativa::class, mappedBy="nivel")
     */
    private $tiposOfertasEducativas;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $codigo;

    public function __construct(string $nombre = NULL, string $abreviatura = NULL, int $orden = NULL, string $codigo = NULL) {
        $this->tiposOfertasEducativas = new ArrayCollection();
        if ($nombre) {
            $this->nombre = $nombre;
        }
        if ($abreviatura) {
            $this->abreviatura = $abreviatura;
        }
        if ($orden) {
            $this->orden = $orden;
        }
        if ($codigo){
            $this->codigo = $codigo;
        }
    }

    public function __toString() {
        return $this->getNombre();
    }

    /*
     * determina si el código del obleto que le paso es el mismo que el objeto instanciado.
     * En ese caso los objetos representan el mismo nivel
     */

    public function esIgual(Nivel $nivel) {
        if ($nivel->getCodigo() == $this->getCodigo()) {
            return TRUE;
        }
        return FALSE;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getNombre(): ?string {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self {
        $this->nombre = $nombre;

        return $this;
    }

    public function getAbreviatura(): ?string {
        return $this->abreviatura;
    }

    public function setAbreviatura(?string $abreviatura): self {
        $this->abreviatura = $abreviatura;

        return $this;
    }

    public function getOrden(): ?int {
        return $this->orden;
    }

    public function setOrden(?int $orden): self {
        $this->orden = $orden;

        return $this;
    }

    /**
     * @return Collection<int, TipoOfertaEducativa>
     */
    public function getTiposOfertasEducativas(): Collection {
        return $this->tiposOfertasEducativas;
    }

    public function addTiposOfertasEducativa(TipoOfertaEducativa $tiposOfertasEducativa): self {
        if (!$this->tiposOfertasEducativas->contains($tiposOfertasEducativa)) {
            $this->tiposOfertasEducativas[] = $tiposOfertasEducativa;
            $tiposOfertasEducativa->setNivel($this);
        }

        return $this;
    }

    public function removeTiposOfertasEducativa(TipoOfertaEducativa $tiposOfertasEducativa): self {
        if ($this->tiposOfertasEducativas->removeElement($tiposOfertasEducativa)) {
            // set the owning side to null (unless already changed)
            if ($tiposOfertasEducativa->getNivel() === $this) {
                $tiposOfertasEducativa->setNivel(null);
            }
        }

        return $this;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

}
