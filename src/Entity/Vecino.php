<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

/**
 * Contiene los establecimientos que usan nuestros mismo edificios
 * 
 * @ORM\Table(name="vecino")
 * @ORM\Entity(repositoryClass="App\Repository\VecinoRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Vecino {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @ORM\Column(type="string", nullable=false)
     */
    private $nombre;

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
     * @ORM\ManyToOne(targetEntity=Edificio::class, inversedBy="vecino")
     * @ORM\JoinColumn(nullable=false)
     */
    private $edificio;    
    
    public function __toString() {
        return $this->getNombre();
    }
    public function __construct() {
        $this->creado = new \DateTime();
        $this->actualizado = new \DateTime();   
    }
    /**
     * @ORM\PrePersist  //en el persist cuando se da de alta uno nuevo
     * @ORM\PreUpdate //en el flush cuando se modifica uno existente
     */
    public function ultimaModificacion()
    {
        $this->setActualizado(new \DateTime());
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

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

    public function getEdificio(): ?Edificio
    {
        return $this->edificio;
    }

    public function setEdificio(?Edificio $edificio): self
    {
        $this->edificio = $edificio;

        return $this;
    }      
}