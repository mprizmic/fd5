<?php

namespace App\Entity;

use App\Repository\TurnoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TurnoRepository::class)
 */
class Turno {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $codigo;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="integer")
     */
    private $orden;

    public function __construct($codigo, $descripcion, $orden) {
        if ($codigo) {
            $this->setCodigo($codigo);
        }
        if ($descripcion) {
            $this->setDescripcion($descripcion);
        }
        if ($orden) {
            $this->setOrden($orden);
        }
    }
    public function __toString() {
        return $this->getCodigo();
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

    public function getOrden(): ?int {
        return $this->orden;
    }

    public function setOrden(int $orden): self {
        $this->orden = $orden;

        return $this;
    }

}
