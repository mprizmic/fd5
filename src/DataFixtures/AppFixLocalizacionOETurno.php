<?php

namespace App\DataFixtures;

use App\Entity\LocalizacionOETurno;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use App\DataFixtures\AppFixEstablecimientoEdificio;
use App\DataFixtures\AppFixUnidadEducativa;

class AppFixLocalizacionOETurno extends Fixture implements DependentFixtureInterface {

    private $encoderFactory;

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function getDependencies() {
        return [
            AppFixTurno::class,
            AppFixLocalizacionOE::class,
        ];
    }

    public function load(ObjectManager $manager): void {

        // incial en la ens 1
        $loet = new LocalizacionOETurno();
        $loet->setLocalizacionOE($this->getReference(AppFixLocalizacionOE::CORDOBA_ENS1_INI));
        $loet->setTurno($this->getReference(AppFixTurno::MAÑANA));
        $manager->persist($loet);
        $manager->flush();

        // incial en la ens 1
        $loet = new LocalizacionOETurno();
        $loet->setLocalizacionOE($this->getReference(AppFixLocalizacionOE::CORDOBA_ENS1_INI));
        $loet->setTurno($this->getReference(AppFixTurno::TARDE));
        $manager->persist($loet);
        $manager->flush();

        // primaria en la ens 1
        $loet = new LocalizacionOETurno();
        $loet->setLocalizacionOE($this->getReference(AppFixLocalizacionOE::CORDOBA_ENS1_PRI));
        $loet->setTurno($this->getReference(AppFixTurno::MAÑANA));
        $manager->persist($loet);
        $manager->flush();

        // primaria en la ens 1
        $loet = new LocalizacionOETurno();
        $loet->setLocalizacionOE($this->getReference(AppFixLocalizacionOE::CORDOBA_ENS1_PRI));
        $loet->setTurno($this->getReference(AppFixTurno::TARDE));
        $manager->persist($loet);
        $manager->flush();

        // primaria en la ens 1
        $loet = new LocalizacionOETurno();
        $loet->setLocalizacionOE($this->getReference(AppFixLocalizacionOE::CORDOBA_ENS1_PRI));
        $loet->setTurno($this->getReference(AppFixTurno::JORNADA_COMPLETA));
        $manager->persist($loet);
        $manager->flush();

        // terciario en la ens 1
        $loet = new LocalizacionOETurno();
        $loet->setLocalizacionOE($this->getReference(AppFixLocalizacionOE::CORDOBA_ENS1_TER_PEI));
        $loet->setTurno($this->getReference(AppFixTurno::MAÑANA));
        $manager->persist($loet);
        $manager->flush();

        // terciario en la ens 1
        $loet = new LocalizacionOETurno();
        $loet->setLocalizacionOE($this->getReference(AppFixLocalizacionOE::CORDOBA_ENS1_TER_PEI));
        $loet->setTurno($this->getReference(AppFixTurno::TARDE));
        $manager->persist($loet);
        $manager->flush();

        // terciario en la ens 1
        $loet = new LocalizacionOETurno();
        $loet->setLocalizacionOE($this->getReference(AppFixLocalizacionOE::CORDOBA_ENS1_TER_PEI));
        $loet->setTurno($this->getReference(AppFixTurno::VESPERTINO));
        $manager->persist($loet);
        $manager->flush();

        /////////////////////////************************************************
        /////////////////////////************************************************
        /////////////////////////************************************************
        /////////////////////////************************************************
        // incial en la ens 3
        $loet = new LocalizacionOETurno();
        $loet->setLocalizacionOE($this->getReference(AppFixLocalizacionOE::PERU_ENS3_INI));
        $loet->setTurno($this->getReference(AppFixTurno::MAÑANA));
        $manager->persist($loet);
        $manager->flush();

        // incial en la ens 3
        $loet = new LocalizacionOETurno();
        $loet->setLocalizacionOE($this->getReference(AppFixLocalizacionOE::PERU_ENS3_INI));
        $loet->setTurno($this->getReference(AppFixTurno::TARDE));
        $manager->persist($loet);
        $manager->flush();

        // incial en la ens 3
        $loet = new LocalizacionOETurno();
        $loet->setLocalizacionOE($this->getReference(AppFixLocalizacionOE::PERU_ENS3_INI));
        $loet->setTurno($this->getReference(AppFixTurno::JORNADA_COMPLETA));
        $manager->persist($loet);
        $manager->flush();

        // primaria en la ens 3
        $loet = new LocalizacionOETurno();
        $loet->setLocalizacionOE($this->getReference(AppFixLocalizacionOE::BOLIVAR_ENS3_PRI));
        $loet->setTurno($this->getReference(AppFixTurno::JORNADA_COMPLETA));
        $manager->persist($loet);
        $manager->flush();

        // terciario en la ens 3
        $loet = new LocalizacionOETurno();
        $loet->setLocalizacionOE($this->getReference(AppFixLocalizacionOE::BOLIVAR_ENS3_TER_PEI));
        $loet->setTurno($this->getReference(AppFixTurno::VESPERTINO));
        $manager->persist($loet);
        $manager->flush();

        // terciario en la ens 3
        $loet = new LocalizacionOETurno();
        $loet->setLocalizacionOE($this->getReference(AppFixLocalizacionOE::ZARAZA_ENS3_TER_PEI));
        $loet->setTurno($this->getReference(AppFixTurno::MAÑANA));
        $manager->persist($loet);
        $manager->flush();

        // terciario en la ens 3
        $loet = new LocalizacionOETurno();
        $loet->setLocalizacionOE($this->getReference(AppFixLocalizacionOE::ZARAZA_ENS3_TER_PEI));
        $loet->setTurno($this->getReference(AppFixTurno::TARDE));
        $manager->persist($loet);
        $manager->flush();

        // terciario en la ens 3
        $loet = new LocalizacionOETurno();
        $loet->setLocalizacionOE($this->getReference(AppFixLocalizacionOE::ZARAZA_ENS3_TER_PEI));
        $loet->setTurno($this->getReference(AppFixTurno::VESPERTINO));
        $manager->persist($loet);
        $manager->flush();
    }

}
