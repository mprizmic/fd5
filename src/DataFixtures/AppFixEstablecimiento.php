<?php

namespace App\DataFixtures;

use App\Entity\Establecimiento;
use App\Entity\TipoEstablecimiento;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use App\DataFixtures\AppFixArea;

class AppFixEstablecimiento extends Fixture implements DependentFixtureInterface {

    private $encoderFactory;
    
    public const ESTAB_ENS1 = 'estab_ens1';
    public const ESTAB_ENS2 = 'estab_ens2';
    public const ESTAB_ENS3 = 'estab_ens3';
    

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function getDependencies() {
        return [
            AppFixArea::class,
        ];
    }

    public function load(ObjectManager $manager): void {

        /*
         * *****************************************************************
         */
        $tipo_establecimiento = new TipoEstablecimiento;
        $tipo_establecimiento->setCodigo('ENS');
        $tipo_establecimiento->setOrden(1);
        $tipo_establecimiento->setDescripcion('Escuela Normal Superior');
        $manager->persist($tipo_establecimiento);
        $manager->flush();
        /*
         * *****************************************************************************************
         */
        $establecimiento = new Establecimiento();
        $establecimiento->setCue('001');
        $establecimiento->setNombre('ENS 1 Roque Saenz Peña');
        $establecimiento->setApodo('ENS 1');
        $establecimiento->setNumero(1);
        $establecimiento->setOrden(1);
        $establecimiento->setTipoEstablecimiento($tipo_establecimiento);
        $establecimiento->setArea($this->getReference(AppFixArea::AREA_FD));
        $manager->persist($establecimiento);
        $manager->flush();
        $this->addReference(self::ESTAB_ENS1, $establecimiento);

        $establecimiento = new Establecimiento();
        $establecimiento->setCue('002');
        $establecimiento->setNombre('ENS 2 M Acosta');
        $establecimiento->setApodo('ENS 2');
        $establecimiento->setNumero(2);
        $establecimiento->setOrden(2);
        $establecimiento->setTipoEstablecimiento($tipo_establecimiento);
        $establecimiento->setArea($this->getReference(AppFixArea::AREA_FD));
        $manager->persist($establecimiento);
        $manager->flush();
        $this->addReference(self::ESTAB_ENS2, $establecimiento);

        $establecimiento = new Establecimiento();
        $establecimiento->setCue('003');
        $establecimiento->setNombre('ENS 3 Rivadavia');
        $establecimiento->setApodo('ENS 3');
        $establecimiento->setNumero(3);
        $establecimiento->setOrden(3);
        $establecimiento->setTipoEstablecimiento($tipo_establecimiento);
        $establecimiento->setArea($this->getReference(AppFixArea::AREA_FD));
        $establecimiento->setUrl('http://ens3.caba.infd.edu.ar/');
        $manager->persist($establecimiento);
        $manager->flush();
        $this->addReference(self::ESTAB_ENS3, $establecimiento);
    }

}
