<?php

namespace App\Entity;

trait TimeStampable
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $creado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $actualizado;

    /**
     * @ORM\PrePersist
     */
    public function updateCreado()
    {
        $this->creado = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->actualizado = new \DateTime();
    }

    /**
     * @return \DateTime|null
     */
    public function getActualizado()
    {
        return $this->actualizado;
    }

    /**
     * @return \DateTime
     */
    public function getCreado()
    {
        return $this->creado;
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
}