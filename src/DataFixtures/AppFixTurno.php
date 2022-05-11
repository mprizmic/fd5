<?php

namespace App\DataFixtures;

use App\Entity\Turno;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class AppFixTurno extends Fixture {

    public const MAÑANA = 'tm';
    public const TARDE = 'tt';
    public const VESPERTINO = 'tv';
    public const NO_APLICA = 'na';
    public const JORNADA_COMPLETA = 'jc';
    public const VIERNES_SABADO = 'vs';

    private $encoderFactory;

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function load(ObjectManager $manager): void {
        
        $turno = new Turno('TM', 'Mañana', 1);
        $manager->persist($turno);
        $manager->flush();

        // referencia para usar desde otros fuentes de fixtures
        $this->addReference(self::MAÑANA, $turno);

        $turno = new Turno('TT', 'Tarde', 2);
        $manager->persist($turno);
        $manager->flush();
        
        $this->addReference(self::TARDE, $turno);

        $turno = new Turno('TV', 'Vespertino', 3);
        $manager->persist($turno);
        $manager->flush();

        $this->addReference(self::VESPERTINO, $turno);
        
        $turno = new Turno('JC', 'Jornada completa', 4);
        $manager->persist($turno);
        $manager->flush();
        
        $this->addReference(self::JORNADA_COMPLETA, $turno);
        
        $turno = new Turno('VS', 'Viernes noche y sábado', 5);
        $manager->persist($turno);
        $manager->flush();
        
        $this->addReference(self::VIERNES_SABADO, $turno);
        
        $turno = new Turno('NA', 'No aplica', 6);
        $manager->persist($turno);
        $manager->flush();
        
        $this->addReference(self::NO_APLICA, $turno);
    }

}
