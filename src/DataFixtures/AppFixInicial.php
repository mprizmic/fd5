<?php

namespace App\DataFixtures;

use App\Entity\Inicial;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class AppFixInicial extends Fixture {

    private $encoderFactory;

    public const CAR_PEI = 'car_pei';
    public const CAR_PEP = 'car_pep';

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function load(ObjectManager $manager): void {

        $inicial = new Inicial();
        $inicial->setNombre('Oferta de Nivel Inicial común');
        $inicial->setDuracion('desde 45 días a 5 años');
        $manager->persist($inicial);
        $manager->flush();
    }

}
