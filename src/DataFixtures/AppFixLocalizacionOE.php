<?php

namespace App\DataFixtures;

use App\Entity\LocalizacionOE;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use App\DataFixtures\AppFixEstablecimientoEdificio;
use App\DataFixtures\AppFixUnidadEducativa;

class AppFixLocalizacionOE extends Fixture implements DependentFixtureInterface {

    private $encoderFactory;

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function getDependencies() {
        return [
            AppFixOfertaEducativa::class,
            AppFixLocalizacion::class,
        ];
    }

    public function load(ObjectManager $manager): void {

        // incial en la ens 1
        $localizacion_oe = new LocalizacionOE();
        $localizacion_oe->setLocalizacion($this->getReference(AppFixLocalizacion::LOCALIZACION_ENS1_INI));
        $localizacion_oe->setOfertaEducativa($this->getReference(AppFixOfertaEducativa::OE_INICIAL));
        $localizacion_oe->setExamenIngreso('s/d');
        $manager->persist($localizacion_oe);
        $manager->flush();
    }

}
