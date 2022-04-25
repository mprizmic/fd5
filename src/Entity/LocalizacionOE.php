<?php

namespace App\Entity;

use App\Repository\LocalizacionOERepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocalizacionOERepository::class)
 */
class LocalizacionOE {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    private $examen_ingreso;

    /**
     * @ORM\ManyToOne(targetEntity=OfertaEducativa::class, inversedBy="localizaciones")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ofertaEducativa;

    /**
     * @ORM\ManyToOne(targetEntity=Localizacion::class, inversedBy="ofertasEducativas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $localizacion;

    public function getId(): ?int {
        return $this->id;
    }

    public function getExamenIngreso(): ?string {
        return $this->examen_ingreso;
    }

    public function setExamenIngreso(?string $examen_ingreso): self {
        $this->examen_ingreso = $examen_ingreso;

        return $this;
    }

    public function getOfertaEducativa(): ?OfertaEducativa
    {
        return $this->ofertaEducativa;
    }

    public function setOfertaEducativa(?OfertaEducativa $ofertaEducativa): self
    {
        $this->ofertaEducativa = $ofertaEducativa;

        return $this;
    }

    public function getLocalizacion(): ?Localizacion
    {
        return $this->localizacion;
    }

    public function setLocalizacion(?Localizacion $localizacion): self
    {
        $this->localizacion = $localizacion;

        return $this;
    }

}
