<?php

namespace App\Entity;

use App\Model\ConstantesGenerales;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
//use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * App\Entity\EstablecimientoEdificio
 *
 * @ORM\Table(name="establecimiento_edificio")
 * @ORM\Entity(repositoryClass="App\Repository\EstablecimientoEdificioRepository")
 */
class EstablecimientoEdificio {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="cue_anexo", type="string", length=2, nullable=false)
     * @Assert\Length(min=2, max=2, exactMessage="El número de anexo debe tener 2 dígitos")
     */
    private $cue_anexo;

    /**
     * @var string $nombre
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */
    private $nombre;

    /**
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $fecha_creacion;

    /**
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $fecha_baja;

    /**
     * @ORM\Column(length=50, nullable=true)
     */
    private $te;

    /**
     * @ORM\Column(length=200, nullable=true)
     */
    private $referente_sga;

    /**
     * @ORM\ManyToOne(targetEntity=Establecimiento::class, inversedBy="edificios")
     */
    private $establecimiento;

    /**
     * @ORM\ManyToOne(targetEntity=Edificio::class, inversedBy="establecimientos")
     */
    private $edificio;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $mail;

    /**
     * @ORM\OneToMany(targetEntity=Localizacion::class, mappedBy="establecimientoEdificio", cascade={"persist", "remove"})
     */
    private $localizaciones;

    public function __construct()
    {
        $this->localizaciones = new ArrayCollection();
    }

    /**
     * Si el edificio es sede devuelve true. Si es anexo devuelve false.
     * @return type
     */
    public function isSede() {
        return ($this->getCueAnexo() == ConstantesGenerales::CUE_SEDE);
    }
//
//    public function strSede() {
//        return $this->isSede() ? 'Sede' : 'Anexo';
//    }

    public function __toString() {
        return $this->getNombre() . ($this->isSede() ? '' : ' - ' . $this->getNombre());
    }

    public function getIdentificacion() {
        return $this->getEstablecimiento()->getNombre() . ($this->isSede() ? '' : ' - ' . $this->getNombre());
    }
//
//    public function __construct() {
//        $this->localizacion = new \Doctrine\Common\Collections\ArrayCollection();
//        $this->establecimientos = new \Doctrine\Common\Collections\ArrayCollection();
//        $this->edificios = new \Doctrine\Common\Collections\ArrayCollection();
//    }

public function getId(): ?int
{
    return $this->id;
}

public function getCueAnexo(): ?string
{
    return $this->cue_anexo;
}

public function setCueAnexo(string $cue_anexo): self
{
    $this->cue_anexo = $cue_anexo;

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

public function getFechaCreacion(): ?\DateTimeInterface
{
    return $this->fecha_creacion;
}

public function setFechaCreacion(?\DateTimeInterface $fecha_creacion): self
{
    $this->fecha_creacion = $fecha_creacion;

    return $this;
}

public function getFechaBaja(): ?\DateTimeInterface
{
    return $this->fecha_baja;
}

public function setFechaBaja(?\DateTimeInterface $fecha_baja): self
{
    $this->fecha_baja = $fecha_baja;

    return $this;
}

public function getTe(): ?string
{
    return $this->te;
}

public function setTe(?string $te): self
{
    $this->te = $te;

    return $this;
}

public function getReferenteSga(): ?string
{
    return $this->referente_sga;
}

public function setReferenteSga(?string $referente_sga): self
{
    $this->referente_sga = $referente_sga;

    return $this;
}

public function getEstablecimiento(): ?Establecimiento
{
    return $this->establecimiento;
}

public function setEstablecimiento(?Establecimiento $establecimiento): self
{
    $this->establecimiento = $establecimiento;

    return $this;
}

public function getEdificio(): ?Edificio
{
    return $this->edificio;
}

public function setEdificio(?Edificio $edificio): self
{
    $this->edificio = $edificio;

    return $this;
}

public function getMail(): ?string
{
    return $this->mail;
}

public function setMail(?string $mail): self
{
    $this->mail = $mail;

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
        $localizacione->setEstablecimientoEdificio($this);
    }

    return $this;
}

public function removeLocalizacione(Localizacion $localizacione): self
{
    if ($this->localizaciones->removeElement($localizacione)) {
        // set the owning side to null (unless already changed)
        if ($localizacione->getEstablecimientoEdificio() === $this) {
            $localizacione->setEstablecimientoEdificio(null);
        }
    }

    return $this;
}

}
