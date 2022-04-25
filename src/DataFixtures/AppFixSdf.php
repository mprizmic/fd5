<?php

namespace App\DataFixtures;

use App\Entity\Sdf;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class AppFixSdf extends Fixture {

    private $encoderFactory;

    public const SDF_COM = 'secundaria_del_futuro_comun';

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function load(ObjectManager $manager): void {

        $sdf = new Sdf();
        $sdf->setNombre('Oferta Secundaria del Futuro');
        $sdf->setDuracion('5 años');
        $manager->persist($sdf);
        $manager->flush();
        $this->addReference(self::SDF_COM, $sdf);
    }

}
