<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="comuna")
 * @ORM\Entity
 */
class Comuna {

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

    public function __toString() {
        return '' . $this->getNumero();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getNumero(): ?int {
        return $this->numero;
    }

    public function setNumero(?int $numero): self {
        $this->numero = $numero;

        return $this;
    }

}
