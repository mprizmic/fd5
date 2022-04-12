<?php

namespace App\DataFixtures;

use App\Entity\Localizacion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use App\DataFixtures\AppFixEstablecimientoEdificio;
use App\DataFixtures\AppFixUnidadEducativa;

class AppFixLocalizacion extends Fixture implements DependentFixtureInterface {

    private $encoderFactory;

    public const LOCALIZACION_ENS1_INI = 'localizacion_ens1_ini';
    public const LOCALIZACION_ENS1_PRI = 'localizacion_ens1_pri';
    public const LOCALIZACION_ENS1_SEC = 'localizacion_ens1_sec';
    public const LOCALIZACION_ENS1_TER = 'localizacion_ens1_ter';
    public const LOCALIZACION_ENS3_INI = 'localizacion_ens3_ini';
    public const LOCALIZACION_ENS3_PRI = 'localizacion_ens3_pri';
    public const LOCALIZACION_ENS3_SEC = 'localizacion_ens3_sec';
    public const LOCALIZACION_ENS3_TER = 'localizacion_ens3_ter';
    public const LOCALIZACION_ENS3_TER_VL = 'localizacion_ens3_ter_vl';

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function getDependencies() {
        return [
            AppFixUnidadEducativa::class,
            AppFixEstablecimientoEdificio::class,
        ];
    }

    public function load(ObjectManager $manager): void {

        // incial en la ens 1
        $localizacion = new Localizacion();
        $localizacion->setEstablecimientoEdificio($this->getReference(AppFixEstablecimientoEdificio::ESTAB_EDIF_ENS1_SEDE));
        $localizacion->setUnidadEducativa($this->getReference(AppFixUnidadEducativa::UNI_EDU_ENS1_INI));
        $manager->persist($localizacion);
        $manager->flush();
        $this->addReference(self::LOCALIZACION_ENS1_INI, $localizacion);

        $localizacion = new Localizacion();
        $localizacion->setEstablecimientoEdificio($this->getReference(AppFixEstablecimientoEdificio::ESTAB_EDIF_ENS1_SEDE));
        $localizacion->setUnidadEducativa($this->getReference(AppFixUnidadEducativa::UNI_EDU_ENS1_PRI));
        $manager->persist($localizacion);
        $manager->flush();
        $this->addReference(self::LOCALIZACION_ENS1_PRI, $localizacion);

        $localizacion = new Localizacion();
        $localizacion->setEstablecimientoEdificio($this->getReference(AppFixEstablecimientoEdificio::ESTAB_EDIF_ENS1_SEDE));
        $localizacion->setUnidadEducativa($this->getReference(AppFixUnidadEducativa::UNI_EDU_ENS1_SEC));
        $manager->persist($localizacion);
        $manager->flush();
        $this->addReference(self::LOCALIZACION_ENS1_SEC, $localizacion);

        $localizacion = new Localizacion();
        $localizacion->setEstablecimientoEdificio($this->getReference(AppFixEstablecimientoEdificio::ESTAB_EDIF_ENS1_SEDE));
        $localizacion->setUnidadEducativa($this->getReference(AppFixUnidadEducativa::UNI_EDU_ENS1_TER));
        $manager->persist($localizacion);
        $manager->flush();
        $this->addReference(self::LOCALIZACION_ENS1_TER, $localizacion);

        //inicial en ens 3 st
        $localizacion = new Localizacion();
        $localizacion->setEstablecimientoEdificio($this->getReference(AppFixEstablecimientoEdificio::ESTAB_EDIF_ENS3_SEDE));
        $localizacion->setUnidadEducativa($this->getReference(AppFixUnidadEducativa::UNI_EDU_ENS3_INI));
        $manager->persist($localizacion);
        $manager->flush();
        $this->addReference(self::LOCALIZACION_ENS3_INI, $localizacion);

        $localizacion = new Localizacion();
        $localizacion->setEstablecimientoEdificio($this->getReference(AppFixEstablecimientoEdificio::ESTAB_EDIF_ENS3_SEDE));
        $localizacion->setUnidadEducativa($this->getReference(AppFixUnidadEducativa::UNI_EDU_ENS3_PRI));
        $manager->persist($localizacion);
        $manager->flush();
        $this->addReference(self::LOCALIZACION_ENS3_PRI, $localizacion);

        $localizacion = new Localizacion();
        $localizacion->setEstablecimientoEdificio($this->getReference(AppFixEstablecimientoEdificio::ESTAB_EDIF_ENS3_SEDE));
        $localizacion->setUnidadEducativa($this->getReference(AppFixUnidadEducativa::UNI_EDU_ENS3_SEC));
        $manager->persist($localizacion);
        $manager->flush();
        $this->addReference(self::LOCALIZACION_ENS3_SEC, $localizacion);

        $localizacion = new Localizacion();
        $localizacion->setEstablecimientoEdificio($this->getReference(AppFixEstablecimientoEdificio::ESTAB_EDIF_ENS3_SEDE));
        $localizacion->setUnidadEducativa($this->getReference(AppFixUnidadEducativa::UNI_EDU_ENS3_TER));
        $manager->persist($localizacion);
        $manager->flush();
        $this->addReference(self::LOCALIZACION_ENS3_TER, $localizacion);

        // terciario ens 3 VL
        $localizacion = new Localizacion();
        $localizacion->setEstablecimientoEdificio($this->getReference(AppFixEstablecimientoEdificio::ESTAB_EDIF_ENS3_ANEXO));
        $localizacion->setUnidadEducativa($this->getReference(AppFixUnidadEducativa::UNI_EDU_ENS3_TER));
        $manager->persist($localizacion);
        $manager->flush();
        $this->addReference(self::LOCALIZACION_ENS3_TER_VL, $localizacion);
    }

}
