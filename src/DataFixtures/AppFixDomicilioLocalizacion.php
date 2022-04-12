<?php

namespace App\DataFixtures;

use App\Entity\DomicilioLocalizacion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use App\DataFixtures\AppFixDomicilio;
use App\DataFixtures\AppFixLocalizacion;

class AppFixDomicilioLocalizacion extends Fixture implements DependentFixtureInterface {

    private $encoderFactory;

    public const DOMIC_LOC_ENS1_INI = 'domic_loc_ens1_ini';
    public const DOMIC_LOC_ENS3VL_TER = 'domic_loc_en3vl_ter';

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function getDependencies() {
        return [
            AppFixDomicilio::class,
            AppFixLocalizacion::class,
        ];
    }

    public function load(ObjectManager $manager): void {

        // inicial en av cordoba
        $domicilio_localizacion = new DomicilioLocalizacion();
        $domicilio_localizacion->setPrincipal(TRUE);
        $domicilio_localizacion->setDomicilio(
                $this->getReference(AppFixDomicilio::DOMIC_SEDE_ENS1_1));
        $domicilio_localizacion->setLocalizacion(
                $this->getReference(AppFixLocalizacion::LOCALIZACION_ENS1_INI));
        $manager->persist($domicilio_localizacion);
        $manager->flush();
        $manager->flush();
        $this->addReference(self::DOMIC_LOC_ENS1_INI, $domicilio_localizacion);

        // terciario en saraza
        $domicilio_localizacion = new DomicilioLocalizacion();
        $domicilio_localizacion->setPrincipal(TRUE);
        $domicilio_localizacion->setDomicilio(
                $this->getReference(AppFixDomicilio::DOMIC_SEDE_ENS3VL));
        $domicilio_localizacion->setLocalizacion(
                $this->getReference(AppFixLocalizacion::LOCALIZACION_ENS3_TER_VL));
        $manager->persist($domicilio_localizacion);
        $manager->flush();
        $this->addReference(self::DOMIC_LOC_ENS3VL_TER, $domicilio_localizacion);
    }

}
