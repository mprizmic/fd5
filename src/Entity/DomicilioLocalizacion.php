<?php

namespace App\Entity;

use App\Repository\DomicilioLocalizacionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DomicilioLocalizacionRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class DomicilioLocalizacion {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $actualizado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $creado;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $principal;

    /**
     * @ORM\ManyToOne(targetEntity=Domicilio::class, inversedBy="domicilioLocalizaciones")
     */
    private $domicilio;

    /**
     * @ORM\ManyToOne(targetEntity=Localizacion::class, inversedBy="ddomicilioLocalizaciones")
     */
    private $localizacion;

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

    public function getPrincipal(): ?bool {
        return $this->principal;
    }

    public function setPrincipal(?bool $principal): self {
        $this->principal = $principal;

        return $this;
    }

    public function getDomicilio(): ?Domicilio {
        return $this->domicilio;
    }

    public function setDomicilio(?Domicilio $domicilio): self {
        $this->domicilio = $domicilio;

        return $this;
    }

    public function getLocalizacion(): ?Localizacion {
        return $this->localizacion;
    }

    public function setLocalizacion(?Localizacion $localizacion): self {
        $this->localizacion = $localizacion;

        return $this;
    }

}
