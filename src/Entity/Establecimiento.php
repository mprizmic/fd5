<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Establecimiento
 *
 * @ORM\Table(name="establecimiento")
 * @ORM\Entity(repositoryClass="App\Repository\EstablecimientoRepository")
 */
class Establecimiento
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
     * @ORM\Column(name="cue", type="string", length=7, nullable=true)
     */
    private $cue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=80, nullable=true)
     */
    private $nombre;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numero", type="integer", nullable=true)
     */
    private $numero;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="string", length=15, nullable=true)
     */
    private $descripcion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fecha_creacion", type="string", length=10, nullable=true)
     */
    private $fechaCreacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tiene_cooperadora", type="string", length=2, nullable=true)
     */
    private $tieneCooperadora;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="apodo", type="string", length=25, nullable=true)
     */
    private $apodo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="orden", type="integer", nullable=true)
     */
    private $orden;


    /**
     * @var string|null
     *
     * @ORM\Column(name="campo_deportes", type="string", length=25, nullable=true)
     */
    private $campoDeportes;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="actualizado", type="datetime", nullable=true)
     */
    private $actualizado;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="creado", type="datetime", nullable=true)
     */
    private $creado;

    /**
     * @ORM\ManyToOne(targetEntity=DistritoEscolar::class, inversedBy="establecimientos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $distritoEscolar;

    /**
     * @ORM\ManyToOne(targetEntity=TipoEstablecimiento::class, inversedBy="establecimientos")
     */
    private $tipoEstablecimiento;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCue(): ?string
    {
        return $this->cue;
    }

    public function setCue(?string $cue): self
    {
        $this->cue = $cue;

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

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(?int $numero): self
    {
        $this->numero = $numero;

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

    public function getFechaCreacion(): ?string
    {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion(?string $fechaCreacion): self
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    public function getTieneCooperadora(): ?string
    {
        return $this->tieneCooperadora;
    }

    public function setTieneCooperadora(?string $tieneCooperadora): self
    {
        $this->tieneCooperadora = $tieneCooperadora;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getApodo(): ?string
    {
        return $this->apodo;
    }

    public function setApodo(?string $apodo): self
    {
        $this->apodo = $apodo;

        return $this;
    }

    public function getOrden(): ?int
    {
        return $this->orden;
    }

    public function setOrden(?int $orden): self
    {
        $this->orden = $orden;

        return $this;
    }

    public function getCampoDeportes(): ?string
    {
        return $this->campoDeportes;
    }

    public function setCampoDeportes(?string $campoDeportes): self
    {
        $this->campoDeportes = $campoDeportes;

        return $this;
    }

    public function getActualizado(): ?\DateTimeInterface
    {
        return $this->actualizado;
    }

    public function setActualizado(?\DateTimeInterface $actualizado): self
    {
        $this->actualizado = $actualizado;

        return $this;
    }

    public function getCreado(): ?\DateTimeInterface
    {
        return $this->creado;
    }

    public function setCreado(?\DateTimeInterface $creado): self
    {
        $this->creado = $creado;

        return $this;
    }

    public function getDistritoEscolar(): ?DistritoEscolar
    {
        return $this->distritoEscolar;
    }

    public function setDistritoEscolar(?DistritoEscolar $distritoEscolar): self
    {
        $this->distritoEscolar = $distritoEscolar;

        return $this;
    }

    public function getTipoEstablecimiento(): ?TipoEstablecimiento
    {
        return $this->tipoEstablecimiento;
    }

    public function setTipoEstablecimiento(?TipoEstablecimiento $tipoEstablecimiento): self
    {
        $this->tipoEstablecimiento = $tipoEstablecimiento;

        return $this;
    }



}
