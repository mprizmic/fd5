<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
//use Symfony\Component\Validator\Constraints as Assert;
//use Doctrine\Common\Collections\ArrayCollection;
//use Fd\TablaBundle\Entity\Nivel;

/**
 * Fd\EstablecimientoBundle\Entity\UnidadEducativa
 *
 * @ORM\Table(name="unidad_educativa")
 * @ORM\Entity(repositoryClass="App\Repository\UnidadEducativaRepository")
 * @ORM\HasLifecycleCallbacks
 */
class UnidadEducativa {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $descripcion
     *
     * @ORM\Column(name="descripcion", type="string", length=30, nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="datetime")
     * 
     */
    private $actualizado;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creado;

    /**
     * @ORM\ManyToOne(targetEntity=Establecimiento::class, inversedBy="unidadEducativa")
     * @ORM\JoinColumn(nullable=false)
     */
    private $establecimiento;

    /**
     * @ORM\ManyToOne(targetEntity=Nivel::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $nivel;

    public function __toString() {
        return $this->descripcion;
    }

    /**
     * @ORM\PrePersist  //en el persist cuando se da de alta uno nuevo
     * @ORM\PreUpdate //en el flush cuando se modifica uno existente
     */
    public function ultimaModificacion() {
        $this->setActualizado(new \DateTime());
    }

    public function __construct() {

        $this->creado = new \DateTime();
        $this->actualizado = new \DateTime();
    }
    /**
     * @return string
     */
    public function getCreadoFormatted()
    {
        if ($this->creado instanceof \DateTime) {
            return $this->creado->format('d/m/Y h:i:s A');
        }

        return '';
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getActualizado(): ?\DateTimeInterface
    {
        return $this->actualizado;
    }

    public function setActualizado(\DateTimeInterface $actualizado): self
    {
        $this->actualizado = $actualizado;

        return $this;
    }

    public function getCreado(): ?\DateTimeInterface
    {
        return $this->creado;
    }

    public function setCreado(\DateTimeInterface $creado): self
    {
        $this->creado = $creado;

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

    public function getNivel(): ?Nivel
    {
        return $this->nivel;
    }

    public function setNivel(?Nivel $nivel): self
    {
        $this->nivel = $nivel;

        return $this;
    }
}
