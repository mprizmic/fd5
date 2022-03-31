<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\String\Slugger\SluggerInterface;
use App\Entity\TimeStampable;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;
/**
 * Edificio
 * 
 * @ORM\Table(name="edificio")
 * @ORM\Entity(repositoryClass="App\Repository\EdificioRepository")
 * @UniqueEntity("slug")
 */
class Edificio {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer $cui
     *
     * @ORM\Column(name="cui", type="integer", nullable=true, unique=true)
     * @Assert\Range(min="0", max="999999", minMessage="El nro de CUI es inválido", maxMessage="CUI fuera de rango. Puede tener hasta 6 dígitos")
     */
    private $cui;
    /**
     * @ORM\Column(type="string", nullable=true, unique=true, length=50)
     * 
     */
    private $referencia;


    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * 
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity=Comuna::class)
     */
    private $comuna;



    
    public function __toString()
    {
        return $this->getReferencia();
    }

    public function computeSlug(SluggerInterface $slugger)
    {
        if (!$this->slug || '-' === $this->slug) {
            $this->slug = (string) $slugger->slug((string) $this)->lower();
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCui(): ?int
    {
        return $this->cui;
    }

    public function setCui(?int $cui): self
    {
        $this->cui = $cui;

        return $this;
    }

    public function getReferencia(): ?string
    {
        return $this->referencia;
    }

    public function setReferencia(?string $referencia): self
    {
        $this->referencia = $referencia;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getComuna(): ?Comuna
    {
        return $this->comuna;
    }

    public function setComuna(?Comuna $comuna): self
    {
        $this->comuna = $comuna;

        return $this;
    }

}
