<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="comuna")
 * @ORM\Entity
 */
class Comuna
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer $numero
     *
     * @ORM\Column(name="numero", type="integer", nullable=true)
     */
    private $numero;

    /**
     * @ORM\OneToMany(targetEntity=Edificio::class, mappedBy="comuna")
     */
    private $edificios;

    public function __construct()
    {
        $this->edificios = new ArrayCollection();
    }

    public function __toString() {
        return ''.$this->getNumero();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, Edificio>
     */
    public function getEdificios(): Collection
    {
        return $this->edificios;
    }

    public function addEdificio(Edificio $edificio): self
    {
        if (!$this->edificios->contains($edificio)) {
            $this->edificios[] = $edificio;
            $edificio->setComuna($this);
        }

        return $this;
    }

    public function removeEdificio(Edificio $edificio): self
    {
        if ($this->edificios->removeElement($edificio)) {
            // set the owning side to null (unless already changed)
            if ($edificio->getComuna() === $this) {
                $edificio->setComuna(null);
            }
        }

        return $this;
    }

}