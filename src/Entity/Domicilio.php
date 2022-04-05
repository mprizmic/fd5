<?php

namespace App\Entity;

use App\Repository\DomicilioRepository;
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

    public function __toString() {
        $retorno = $this->getCalle() . ' ' . $this->getAltura();
        if ($this->getPrincipal()) {
            $retorno = $retorno . '/Prin';
        }
        return $retorno;
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

}
