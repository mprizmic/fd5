<?php

namespace App\DataFixtures;

use App\Entity\CarreraFD;
use App\Entity\TipoFormacion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class AppFixCarreraFD extends Fixture implements DependentFixtureInterface {

    private $encoderFactory;

    public const CAR_PEI = 'car_pei';
    public const CAR_PEP = 'car_pep';

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function getDependencies() {
        return [
            AppFixTipoFormacion::class,
        ];
    }

    public function load(ObjectManager $manager): void {

        $carrera = new CarreraFD();
        $carrera->setNombre('Profesorado de Educación Inicial');
        $carrera->setDuracion('4 años');
        $carrera->setComentario('aca va algún comentario');
        $carrera->setTipoFormacion($this->getReference(AppFixTipoFormacion::TIPO_FORMACION_FD));
        $manager->persist($carrera);
        $manager->flush();
        $this->addReference(self::CAR_PEI, $carrera);

        $carrera = new CarreraFD();
        $carrera->setNombre('Profesorado de Educación Primaria');
        $carrera->setDuracion('4 años');
        $carrera->setComentario('aca va algún comentario');
        $carrera->setTipoFormacion($this->getReference(AppFixTipoFormacion::TIPO_FORMACION_FD));
        $manager->persist($carrera);
        $manager->flush();
        $this->addReference(self::CAR_PEP, $carrera);
    }

}
