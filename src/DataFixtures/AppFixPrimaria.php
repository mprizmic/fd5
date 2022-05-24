<?php

namespace App\DataFixtures;

use App\Entity\Primaria;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class AppFixPrimaria extends Fixture {

    private $encoderFactory;

    public const PRI_COM = 'primaria_comun';

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function load(ObjectManager $manager): void {

        $primaria = new Primaria();
        $primaria->setNombre('Primaria Común');
        $primaria->setDuracion('7 años');
        $manager->persist($primaria);
        $manager->flush();
        $this->addReference(self::PRI_COM, $primaria);
    }

}
