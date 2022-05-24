<?php

namespace App\DataFixtures;

use App\Entity\Inicial;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class AppFixInicial extends Fixture {

    private $encoderFactory;

    public const INI_COM = 'inicial_comun';

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function load(ObjectManager $manager): void {

        $inicial = new Inicial();
        $inicial->setNombre('N Inicial común');
        $inicial->setDuracion('desde 45 días a 5 años');
        $manager->persist($inicial);
        $manager->flush();
        $this->addReference(self::INI_COM, $inicial);
    }

}
