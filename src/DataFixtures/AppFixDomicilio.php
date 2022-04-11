<?php

namespace App\DataFixtures;

use App\Entity\Domicilio;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use App\DataFixtures\AppFixEdificio;

class AppFixDomicilio extends Fixture implements DependentFixtureInterface {

    private $encoderFactory;

    public const DOMIC_SEDE_ENS1_1 = 'domic_sede_ens1_1';
    public const DOMIC_SEDE_ENS1_2 = 'domic_sede_ens1_2';
    public const DOMIC_SEDE_ENS1_3 = 'domic_sede_ens1_3';
    public const DOMIC_SEDE_ENS1_4 = 'domic_sede_ens1_4';
    public const DOMIC_SEDE_ENS3ST = 'domic_sede_ens3st';
    public const DOMIC_SEDE_ENS3VL = 'domic_sede_ens3vl';

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function getDependencies() {
        return [
            AppFixEdificio::class,
            AppFixDistritoEscolar::class,
            AppFixBarrio::class,
        ];
    }

    public function load(ObjectManager $manager): void {

        $domicilio = new Domicilio();
        $domicilio->setCalle('Córdoba, Av.');
        $domicilio->setAltura('1951');
        $domicilio->setCPostal('C1120AAB');
        $domicilio->setPrincipal(TRUE);
        $domicilio->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS1));
        $manager->persist($domicilio);
        $manager->flush();
        $this->addReference(self::DOMIC_SEDE_ENS1_1, $domicilio);

        $domicilio = new Domicilio();
        $domicilio->setCalle('Ayacucho');
        $domicilio->setAltura('875');
        $domicilio->setCPostal('C1120AAB');
        $domicilio->setPrincipal(FALSE);
        $domicilio->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS1));
        $manager->persist($domicilio);
        $manager->flush();
        $this->addReference(self::DOMIC_SEDE_ENS1_2, $domicilio);

        $domicilio = new Domicilio();
        $domicilio->setCalle('Paraguay');
        $domicilio->setAltura('1950');
        $domicilio->setCPostal('C1121ABD');
        $domicilio->setPrincipal(FALSE);
        $domicilio->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS1));
        $manager->persist($domicilio);
        $manager->flush();
        $this->addReference(self::DOMIC_SEDE_ENS1_3, $domicilio);

        $domicilio = new Domicilio();
        $domicilio->setCalle('Riobamba');
        $domicilio->setAltura('882');
        $domicilio->setCPostal('C1116ABB');
        $domicilio->setPrincipal(FALSE);
        $domicilio->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS1));
        $manager->persist($domicilio);
        $manager->flush();
        $this->addReference(self::DOMIC_SEDE_ENS1_4, $domicilio);

        //ens 3 st
        $domicilio = new Domicilio();
        $domicilio->setCalle('Bolívar');
        $domicilio->setAltura('1235');
        $domicilio->setCPostal('C1141AAA');
        $domicilio->setPrincipal(TRUE);
        $domicilio->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS3ST));
        $manager->persist($domicilio);
        $manager->flush();
        $this->addReference(self::DOMIC_SEDE_ENS3ST, $domicilio);

        // ens 3 vl
        $domicilio = new Domicilio();
        $domicilio->setCalle('Saraza');
        $domicilio->setAltura('4241');
        $domicilio->setCPostal('C1407AAE');
        $domicilio->setPrincipal(TRUE);
        $domicilio->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS3VL));
        $manager->persist($domicilio);
        $manager->flush();
        $this->addReference(self::DOMIC_SEDE_ENS3VL, $domicilio);
    }

}
