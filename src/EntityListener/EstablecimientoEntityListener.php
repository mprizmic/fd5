<?php

namespace App\EntityListener;

use App\Entity\Establecimiento;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;

/*
* escucha el prepersist y el preupdate de EStablecimiento para calcular y guardar el sluger
* No se usa un lifeCycle por que no se le puede inyectar el slugge
*/

class EstablecimientoEntityListener
{
    private $slugger;
    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }
    public function prePersist(Establecimiento $establecimiento, LifecycleEventArgs $event)
    {
        $establecimiento->computeSlug($this->slugger);
    }
    public function preUpdate(Establecimiento $establecimiento, LifecycleEventArgs $event)
    {
        $establecimiento->computeSlug($this->slugger);
    }
}