<?php

namespace App\DataFixtures;

use App\Entity\Area;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class AppFixArea extends Fixture {

    private $encoderFactory;
    
    public const AREA_FD = 'area_fd';
    public const AREA_UC = 'area_uc';

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function load(ObjectManager $manager): void {


        /*
         * *****************************************************************************************
         * area
         */
        $area1 = new Area();
        $area1->setCodigo('DENS');
        $area1->setDescripcion('Formación docente');
        $manager->persist($area1);
        $manager->flush();
        
        $this->addReference(self::AREA_FD, $area1);

        $area2 = new Area();
        $area2->setCodigo('UCSFD');
        $area2->setDescripcion('Unidad de Coordinación');
        $manager->persist($area2);
        $manager->flush();

        $this->addReference(self::AREA_UC, $area2);
    }

}
