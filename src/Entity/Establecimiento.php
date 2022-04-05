<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\String\Slugger\SluggerInterface;
//use App\Entity\TimeStampable;

/**
 * Establecimiento
 *
 * @ORM\Table(name="establecimiento")
 * @ORM\Entity(repositoryClass="App\Repository\EstablecimientoRepository")
 * @UniqueEntity("slug")
 * @ORM\HasLifecycleCallbacks
 */
class Establecimiento {

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
     * @ORM\ManyToOne(targetEntity=TipoEstablecimiento::class, inversedBy="establecimientos")
     */
    private $tipoEstablecimiento;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * 
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity=UnidadEducativa::class, mappedBy="establecimiento")
     */
    private $unidadEducativa;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $creado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $actualizado;

    /**
     * @ORM\OneToMany(targetEntity=EstablecimientoEdificio::class, mappedBy="establecimiento")
     */
    private $edificios;

    /**
     * @ORM\ManyToOne(targetEntity=Area::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $area;

    public function __construct() {
        $this->unidadEducativa = new ArrayCollection();
        $this->edificios = new ArrayCollection();
    }

    public function __toString() {
        return $this->getApodo();
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

    /**
     * @return string
     */
    public function getCreadoFormatted() {
        if ($this->creado instanceof \DateTime) {
            return $this->creado->format('d/m/Y h:i:s A');
        }

        return '';
    }

    public function computeSlug(SluggerInterface $slugger) {
        if (!$this->slug || '-' === $this->slug) {
            $this->slug = (string) $slugger->slug((string) $this)->lower();
        }
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getCue(): ?string {
        return $this->cue;
    }

    public function setCue(?string $cue): self {
        $this->cue = $cue;

        return $this;
    }

    public function getNombre(): ?string {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self {
        $this->nombre = $nombre;

        return $this;
    }

    public function getNumero(): ?int {
        return $this->numero;
    }

    public function setNumero(?int $numero): self {
        $this->numero = $numero;

        return $this;
    }

    public function getDescripcion(): ?string {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getFechaCreacion(): ?string {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion(?string $fechaCreacion): self {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    public function getTieneCooperadora(): ?string {
        return $this->tieneCooperadora;
    }

    public function setTieneCooperadora(?string $tieneCooperadora): self {
        $this->tieneCooperadora = $tieneCooperadora;

        return $this;
    }

    public function getUrl(): ?string {
        return $this->url;
    }

    public function setUrl(?string $url): self {
        $this->url = $url;

        return $this;
    }

    public function getApodo(): ?string {
        return $this->apodo;
    }

    public function setApodo(?string $apodo): self {
        $this->apodo = $apodo;

        return $this;
    }

    public function getOrden(): ?int {
        return $this->orden;
    }

    public function setOrden(?int $orden): self {
        $this->orden = $orden;

        return $this;
    }

    public function getCampoDeportes(): ?string {
        return $this->campoDeportes;
    }

    public function setCampoDeportes(?string $campoDeportes): self {
        $this->campoDeportes = $campoDeportes;

        return $this;
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

    public function setCreado(?\DateTimeInterface $creado): self {
        $this->creado = $creado;

        return $this;
    }

    public function getTipoEstablecimiento(): ?TipoEstablecimiento {
        return $this->tipoEstablecimiento;
    }

    public function setTipoEstablecimiento(?TipoEstablecimiento $tipoEstablecimiento): self {
        $this->tipoEstablecimiento = $tipoEstablecimiento;

        return $this;
    }

    public function getSlug(): ?string {
        return $this->slug;
    }

    public function setSlug(string $slug): self {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection<int, UnidadEducativa>
     */
    public function getUnidadEducativa(): Collection {
        return $this->unidadEducativa;
    }

    public function addUnidadEducativa(UnidadEducativa $unidadEducativa): self {
        if (!$this->unidadEducativa->contains($unidadEducativa)) {
            $this->unidadEducativa[] = $unidadEducativa;
            $unidadEducativa->setEstablecimiento($this);
        }

        return $this;
    }

    public function removeUnidadEducativa(UnidadEducativa $unidadEducativa): self {
        if ($this->unidadEducativa->removeElement($unidadEducativa)) {
            // set the owning side to null (unless already changed)
            if ($unidadEducativa->getEstablecimiento() === $this) {
                $unidadEducativa->setEstablecimiento(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, EstablecimientoEdificio>
     */
    public function getEdificios(): Collection
    {
        return $this->edificios;
    }

    public function addEdificio(EstablecimientoEdificio $edificio): self
    {
        if (!$this->edificios->contains($edificio)) {
            $this->edificios[] = $edificio;
            $edificio->setEstablecimiento($this);
        }

        return $this;
    }

    public function removeEdificio(EstablecimientoEdificio $edificio): self
    {
        if ($this->edificios->removeElement($edificio)) {
            // set the owning side to null (unless already changed)
            if ($edificio->getEstablecimiento() === $this) {
                $edificio->setEstablecimiento(null);
            }
        }

        return $this;
    }

    public function getArea(): ?area
    {
        return $this->area;
    }

    public function setArea(?area $area): self
    {
        $this->area = $area;

        return $this;
    }

}
