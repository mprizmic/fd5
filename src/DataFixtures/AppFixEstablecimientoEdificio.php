<?php

namespace App\DataFixtures;

use App\Entity\EstablecimientoEdificio;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use App\DataFixtures\AppFixEdificio;
use App\DataFixtures\AppFixEstablecimiento;

class AppFixEstablecimientoEdificio extends Fixture implements DependentFixtureInterface {

    private $encoderFactory;

    public const ESTAB_EDIF_ENS1_SEDE = 'estab_edif ens1_sede';
    public const ESTAB_EDIF_ENS3_SEDE = 'estab_edif_ens3_sede';
    public const ESTAB_EDIF_ENS3_ANEXO = 'estab_edif_ens3_anexo';

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function getDependencies() {
        return [
            AppFixEdificio::class,
            AppFixEstablecimiento::class,
        ];
    }

    public function load(ObjectManager $manager): void {

        // sede de la ens 1
        $estab_edif = new EstablecimientoEdificio();
        $estab_edif->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS1));
        $estab_edif->setEstablecimiento($this->getReference(AppFixEstablecimiento::ESTAB_ENS1));
        $estab_edif->setNombre('Sede Av. Córdoba');
        $estab_edif->setCueAnexo('00');
        $manager->persist($estab_edif);
        $manager->flush();
        $this->addReference(self::ESTAB_EDIF_ENS1_SEDE, $estab_edif);

        // sede de la ens 3
        $estab_edif = new EstablecimientoEdificio();
        $estab_edif->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS3ST));
        $estab_edif->setEstablecimiento($this->getReference(AppFixEstablecimiento::ESTAB_ENS3));
        $estab_edif->setNombre('Sede Bolívar');
        $estab_edif->setCueAnexo('00');
        $estab_edif->setTe('4361-8965');
        $estab_edif->setMail('ens3st@bue.edu.ar');
        $manager->persist($estab_edif);
        $manager->flush();
        $this->addReference(self::ESTAB_EDIF_ENS3_SEDE, $estab_edif);

        // anexo de la ens 3
        $estab_edif = new EstablecimientoEdificio();
        $estab_edif->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS3VL));
        $estab_edif->setEstablecimiento($this->getReference(AppFixEstablecimiento::ESTAB_ENS3));
        $estab_edif->setNombre('Anexo Villa Lugano');
        $estab_edif->setCueAnexo('01');
        $estab_edif->setTe('4602-4206');
        $estab_edif->setMail('ens3vl@bue.edu.ar');
        $manager->persist($estab_edif);
        $manager->flush();
        $this->addReference(self::ESTAB_EDIF_ENS3_ANEXO, $estab_edif);
    }

}
