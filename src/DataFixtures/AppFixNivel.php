<?php

namespace App\DataFixtures;

use App\Entity\Nivel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class AppFixNivel extends Fixture {

    public const NIVEL_INICIAL = 'nivel_inicial';
    public const NIVEL_PRIMARIO = 'nivel_primario';
    public const NIVEL_SECUNDARIO = 'nivel_secundario';
    public const NIVEL_TERCIARIO = 'nivel_terciario';

    private $encoderFactory;

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function load(ObjectManager $manager): void {
        
        $nivel = new Nivel('Inicial', 'Ini', 1);
        $manager->persist($nivel);
        $manager->flush();

        // referencia para usar desde otros fuentes de fixtures
        $this->addReference(self::NIVEL_INICIAL, $nivel);

        $nivel = new Nivel('Primario', 'Pri', 2);
        $manager->persist($nivel);
        $manager->flush();
        
        $this->addReference(self::NIVEL_PRIMARIO, $nivel);

        $nivel = new Nivel('Medio', 'Med', 3);
        $manager->persist($nivel);
        $manager->flush();

        $this->addReference(self::NIVEL_SECUNDARIO, $nivel);
        
        $nivel = new Nivel('Terciario', 'Ter', 4);
        $manager->persist($nivel);
        $manager->flush();
        
        $this->addReference(self::NIVEL_TERCIARIO, $nivel);
    }

}
