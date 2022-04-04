<?php

namespace App\EntityListener;

use App\Entity\Edificio;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;

/*
* escucha el prepersist y el preupdate de Edificio para calcular y guardar el sluger
* No se usa un lifeCycle por que no se le puede inyectar el slugge
*/

class EdificioEntityListener
{
    private $slugger;
    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }
    public function prePersist(Edificio $edificio, LifecycleEventArgs $event)
    {
        $edificio->computeSlug($this->slugger);
    }
    public function preUpdate(Edificio $edificio, LifecycleEventArgs $event)
    {
        $edificio->computeSlug($this->slugger);
    }
}