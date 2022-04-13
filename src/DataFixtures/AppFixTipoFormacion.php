<?php

namespace App\DataFixtures;

use App\Entity\TipoFormacion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class AppFixTipoFormacion extends Fixture {

    private $encoderFactory;
    
    public const TIPO_FORMACION_FD = 'Formacion_docente';
    public const TIPO_FORMACION_FT = 'Formacion_técnica';
    

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function load(ObjectManager $manager): void {

        $tipo_formacion = new TipoFormacion();
        $tipo_formacion->setCodigo('FD');
        $tipo_formacion->setDescripcion(self::TIPO_FORMACION_FD);
        $manager->persist($tipo_formacion);
        $manager->flush();
        $this->addReference(self::TIPO_FORMACION_FD, $tipo_formacion);

        $tipo_formacion = new TipoFormacion();
        $tipo_formacion->setCodigo('FT');
        $tipo_formacion->setDescripcion(self::TIPO_FORMACION_FT);
        $manager->persist($tipo_formacion);
        $manager->flush();
        $this->addReference(self::TIPO_FORMACION_FT, $tipo_formacion);
    }

}
