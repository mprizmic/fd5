<?php

namespace App\DataFixtures;

use App\Entity\Barrio;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class AppFixBarrio extends Fixture {

    private $encoderFactory;
    
    public const BARRIO_PAL = 'barrio_pal';
    public const BARRIO_STE = 'barrio_ste';
    public const BARRIO_VLG = 'barrio_vlg';

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function load(ObjectManager $manager): void {

        $barrio = new Barrio();
        $barrio->setNombre('Palermo');
        $barrio->setAbreviatura('PAL');
        $manager->persist($barrio);
        $manager->flush();
        $this->addReference(self::BARRIO_PAL, $barrio);

        $barrio = new Barrio();
        $barrio->setNombre('San Telmo');
        $barrio->setAbreviatura('STE');
        $manager->persist($barrio);
        $manager->flush();
        $this->addReference(self::BARRIO_STE, $barrio);

        $barrio = new Barrio();
        $barrio->setNombre('Villa Lugano');
        $barrio->setAbreviatura('VLG');
        $manager->persist($barrio);
        $manager->flush();
        $this->addReference(self::BARRIO_VLG, $barrio);
    }

}
