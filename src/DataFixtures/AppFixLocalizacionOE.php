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
    
    public const CORDOBA_ENS1_INI   = 'cordoba_ens1_ini';
    public const CORDOBA_ENS1_PRI   = 'cordoba_ens1_pri';
    public const CORDOBA_ENS1_TER_PEI   = 'cordoba_ens1_ter_pei';
    public const PERU_ENS3_INI      = 'peru_ens3_ini';
    public const BOLIVAR_ENS3_PRI   = 'bolivar_ens3_pri';
    public const BOLIVAR_ENS3_TER_PEI   = 'bolivar_ens3_ter_pei';
    public const ZARAZA_ENS3_TER_PEI    = 'zaraza_ens3_ter_pei';

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
        $localizacion_oe->setExamenIngreso('no');
        $manager->persist($localizacion_oe);
        $manager->flush();
        
        $this->addReference(self::CORDOBA_ENS1_INI, $localizacion_oe);

        // primaria en la ens 1
        $localizacion_oe = new LocalizacionOE();
        $localizacion_oe->setLocalizacion($this->getReference(AppFixLocalizacion::LOCALIZACION_ENS1_PRI));
        $localizacion_oe->setOfertaEducativa($this->getReference(AppFixOfertaEducativa::OE_PRIMARIA));
        $localizacion_oe->setExamenIngreso('no');
        $manager->persist($localizacion_oe);
        $manager->flush();
        
        $this->addReference(self::CORDOBA_ENS1_PRI, $localizacion_oe);

        // incial en la ens 3
        $localizacion_oe = new LocalizacionOE();
        $localizacion_oe->setLocalizacion($this->getReference(AppFixLocalizacion::LOCALIZACION_ENS3_INI));
        $localizacion_oe->setOfertaEducativa($this->getReference(AppFixOfertaEducativa::OE_INICIAL));
        $localizacion_oe->setExamenIngreso('no');
        $manager->persist($localizacion_oe);
        $manager->flush();

        $this->addReference(self::PERU_ENS3_INI, $localizacion_oe);
        
        // primaria en la ens 3
        $localizacion_oe = new LocalizacionOE();
        $localizacion_oe->setLocalizacion($this->getReference(AppFixLocalizacion::LOCALIZACION_ENS3_PRI));
        $localizacion_oe->setOfertaEducativa($this->getReference(AppFixOfertaEducativa::OE_PRIMARIA));
        $localizacion_oe->setExamenIngreso('no');
        $manager->persist($localizacion_oe);
        $manager->flush();
        
        $this->addReference(self::BOLIVAR_ENS3_PRI, $localizacion_oe);

        // carrera PEI en la ENS 1
        $localizacion_oe = new LocalizacionOE();
        $localizacion_oe->setLocalizacion($this->getReference(AppFixLocalizacion::LOCALIZACION_ENS1_TER));
        $localizacion_oe->setOfertaEducativa($this->getReference(AppFixOfertaEducativa::OE_CAR_PEI));
        $localizacion_oe->setExamenIngreso('no');
        $manager->persist($localizacion_oe);
        $manager->flush();

        $this->addReference(self::CORDOBA_ENS1_TER_PEI, $localizacion_oe);
        
        // carrera PEI en la ENS 3 ST
        $localizacion_oe = new LocalizacionOE();
        $localizacion_oe->setLocalizacion($this->getReference(AppFixLocalizacion::LOCALIZACION_ENS3_TER));
        $localizacion_oe->setOfertaEducativa($this->getReference(AppFixOfertaEducativa::OE_CAR_PEI));
        $localizacion_oe->setExamenIngreso('no');
        $manager->persist($localizacion_oe);
        $manager->flush();

        $this->addReference(self::BOLIVAR_ENS3_TER_PEI, $localizacion_oe);
        
        // carrera PEI en la ENS 3 VL
        $localizacion_oe = new LocalizacionOE();
        $localizacion_oe->setLocalizacion($this->getReference(AppFixLocalizacion::LOCALIZACION_ENS3_TER_VL));
        $localizacion_oe->setOfertaEducativa($this->getReference(AppFixOfertaEducativa::OE_CAR_PEI));
        $localizacion_oe->setExamenIngreso('no');
        $manager->persist($localizacion_oe);
        $manager->flush();
        
        $this->addReference(self::ZARAZA_ENS3_TER_PEI, $localizacion_oe);

    }
}
