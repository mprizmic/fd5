<?php

namespace App\DataFixtures;

use App\Entity\Carrera;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class AppFixCarrera extends Fixture implements DependentFixtureInterface {

    private $encoderFactory;

    public const CAR_PEI = 'car_pei';
    public const CAR_PEP = 'car_pep';
    public const CAR_TSG = 'car_tsg';

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function getDependencies() {
        return [
            AppFixTipoFormacion::class,
            AppFixOfertaEducativa::class,
        ];
    }

    public function load(ObjectManager $manager): void {

        $carrera = new Carrera();
        $carrera->setNombre('Profesorado de Educación Inicial');
        $carrera->setDuracion('4 años');
        $carrera->setComentario('aca va algún comentario');
        $carrera->setTipoFormacion($this->getReference(AppFixTipoFormacion::TIPO_FORMACION_FD));
        $carrera->setOferta($this->getReference(AppFixOfertaEducativa::OE_CAR_PEI));
        $manager->persist($carrera);
        $manager->flush();
        $this->addReference(self::CAR_PEI, $carrera);

        $carrera = new Carrera();
        $carrera->setNombre('Profesorado de Educación Primaria');
        $carrera->setDuracion('4 años');
        $carrera->setComentario('aca va algún comentario');
        $carrera->setTipoFormacion($this->getReference(AppFixTipoFormacion::TIPO_FORMACION_FD));
        $carrera->setOferta($this->getReference(AppFixOfertaEducativa::OE_CAR_PEP));
        $manager->persist($carrera);
        $manager->flush();
        $this->addReference(self::CAR_PEP, $carrera);

        $carrera = new Carrera();
        $carrera->setNombre('Gastronomía');
        $carrera->setDuracion('3 años');
        $carrera->setComentario('aca va algún comentario');
        $carrera->setTipoFormacion($this->getReference(AppFixTipoFormacion::TIPO_FORMACION_FD));
        $carrera->setOferta($this->getReference(AppFixOfertaEducativa::OE_CAR_TSG));
        $manager->persist($carrera);
        $manager->flush();
        $this->addReference(self::CAR_TSG, $carrera);
    }

}
