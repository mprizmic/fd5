<?php

namespace App\Entity;

use App\Repository\LocalizacionOETurnoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocalizacionOETurnoRepository::class)
 */
class LocalizacionOETurno {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Turno::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $turno;

    /**
     * @ORM\ManyToOne(targetEntity=LocalizacionOE::class, inversedBy="turnos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $localizacionOE;

    public function getId(): ?int {
        return $this->id;
    }

    public function getTurno(): ?Turno {
        return $this->turno;
    }

    public function setTurno(?Turno $turno): self {
        $this->turno = $turno;

        return $this;
    }

    public function getLocalizacionOE(): ?LocalizacionOE
    {
        return $this->localizacionOE;
    }

    public function setLocalizacionOE(?LocalizacionOE $localizacionOE): self
    {
        $this->localizacionOE = $localizacionOE;

        return $this;
    }

}
