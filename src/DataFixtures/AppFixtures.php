<?php

namespace App\DataFixtures;

use App\Entity\Aviso;
use App\Entity\Comuna;
use App\Entity\Domicilio;
use App\Entity\DomicilioLocalizacion;
use App\Entity\Edificio;
use App\Entity\Establecimiento;
use App\Entity\EstablecimientoEdificio;
use App\Entity\Localizacion;
use App\Entity\TipoEstablecimiento;
use App\Entity\UnidadEducativa;
use App\Entity\User;
use App\Entity\Vecino;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use App\DataFixtures\AppFixArea;
use App\DataFixtures\AppFixBarrio;
use App\DataFixtures\AppFixEdificio;
use App\DataFixtures\AppFixNivel;

class AppFixtures extends Fixture implements DependentFixtureInterface {

    private $encoderFactory;

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function getDependencies() {
        return [
            AppFixNivel::class,
            AppFixArea::class,
            AppFixDistritoEscolar::class,
            AppFixBarrio::class,
            AppFixEdificio::class,
        ];
    }

    public function load(ObjectManager $manager): void {

        $dia = new \DateTime('1/1/2022');
        $dia->format('d/m/Y');


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
        $establecimiento1 = new Establecimiento();
        $establecimiento1->setCue('001');
        $establecimiento1->setNombre('ENS 1 Roque Saenz Peña');
        $establecimiento1->setApodo('ENS 1');
        $establecimiento1->setNumero(1);
        $establecimiento1->setOrden(1);
        $establecimiento1->setTipoEstablecimiento($tipo_establecimiento);
        $establecimiento1->setArea($this->getReference(AppFixArea::AREA_FD));
        $manager->persist($establecimiento1);
        $manager->flush();

        $establecimiento2 = new Establecimiento();
        $establecimiento2->setCue('002');
        $establecimiento2->setNombre('ENS 2 M Acosta');
        $establecimiento2->setApodo('ENS 2');
        $establecimiento2->setNumero(2);
        $establecimiento2->setOrden(2);
        $establecimiento2->setTipoEstablecimiento($tipo_establecimiento);
        $establecimiento2->setArea($this->getReference(AppFixArea::AREA_FD));
//        $establecimiento2->setArea($area1);
        $manager->persist($establecimiento2);
        $manager->flush();

        $establecimiento3 = new Establecimiento();
        $establecimiento3->setCue('003');
        $establecimiento3->setNombre('ENS 3 Rivadavia');
        $establecimiento3->setApodo('ENS 3');
        $establecimiento3->setNumero(3);
        $establecimiento3->setOrden(3);
        $establecimiento3->setTipoEstablecimiento($tipo_establecimiento);
        $establecimiento3->setArea($this->getReference(AppFixArea::AREA_FD));
//        $establecimiento3->setArea($area1);
        $establecimiento3->setUrl('http://ens3.caba.infd.edu.ar/');
        $manager->persist($establecimiento3);
        $manager->flush();
        /*
         * *****************************************************************************************
         */
        $aviso = new Aviso();
        $aviso->setFecha($dia);
        $aviso->setDescripcion('en desarrollo');
        $aviso->setActivo(true);
        $manager->persist($aviso);
        $manager->flush();

        /*
         * *****************************************************************************************
         */
        $user1 = new User();
        $user1->setEmail('mprizmic@gmail.com');
        $user1->setUsername('marcelo');
        $user1->setRoles(array('ROLE_USER', 'ROLE_SUPER_ADMIN', 'ROLE_ADMIN'));

        $user1->setPassword($this->encoderFactory->getEncoder(User::class)->encodePassword('123', null));

        $manager->persist($user1);

        $user2 = new User();
        $user2->setEmail('otro@otro.com');
        $user2->setUsername('otro');
        $user2->setRoles(array('ROLE_USER'));

        $user2->setPassword($this->encoderFactory->getEncoder(User::class)->encodePassword('123', null));

        $manager->persist($user2);
        $manager->flush();

     /*
         * *****************************************************************************************
         */
        // ens 1
        $domicilio1 = new Domicilio();
        $domicilio1->setCalle('Córdoba, Av.');
        $domicilio1->setAltura('1951');
        $domicilio1->setCPostal('C1120AAB');
        $domicilio1->setPrincipal(TRUE);
        $domicilio1->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS1));
        $manager->persist($domicilio1);
        $manager->flush();

        $domicilio2 = new Domicilio();
        $domicilio2->setCalle('Ayacucho');
        $domicilio2->setAltura('875');
        $domicilio2->setCPostal('C1120AAB');
        $domicilio2->setPrincipal(FALSE);
        $domicilio1->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS1));
        $manager->persist($domicilio2);
        $manager->flush();

        $domicilio3 = new Domicilio();
        $domicilio3->setCalle('Paraguay');
        $domicilio3->setAltura('1950');
        $domicilio3->setCPostal('C1121ABD');
        $domicilio3->setPrincipal(FALSE);
        $domicilio3->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS1));
        $manager->persist($domicilio3);
        $manager->flush();

        $domicilio4 = new Domicilio();
        $domicilio4->setCalle('Riobamba');
        $domicilio4->setAltura('882');
        $domicilio4->setCPostal('C1116ABB');
        $domicilio4->setPrincipal(FALSE);
        $domicilio4->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS1));
        $manager->persist($domicilio4);
        $manager->flush();

        //ens 3 st
        $domicilio_ens3st = new Domicilio();
        $domicilio_ens3st->setCalle('Bolívar');
        $domicilio_ens3st->setAltura('1235');
        $domicilio_ens3st->setCPostal('C1141AAA');
        $domicilio_ens3st->setPrincipal(TRUE);
        $domicilio_ens3st->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS3ST));
        $manager->persist($domicilio_ens3st);
        $manager->flush();

        // ens 3 vl
        $domicilio_ens3vl = new Domicilio();
        $domicilio_ens3vl->setCalle('Saraza');
        $domicilio_ens3vl->setAltura('4241');
        $domicilio_ens3vl->setCPostal('C1407AAE');
        $domicilio_ens3vl->setPrincipal(TRUE);
        $domicilio_ens3vl->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS3VL));
        $manager->persist($domicilio_ens3vl);
        $manager->flush();

        /*
         * *****************************************************************************************
         * establecimiento_edificio
         */
        // sede de la ens 1
        $establecimiento_edificio1 = new EstablecimientoEdificio();
        $establecimiento_edificio1->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS1));
        $establecimiento_edificio1->setEstablecimiento($establecimiento1);
        $establecimiento_edificio1->setNombre('Sede Av. Córdoba');
        $establecimiento_edificio1->setCueAnexo('00');
        $manager->persist($establecimiento_edificio1);
        $manager->flush();

        // sede de la ens 3
        $establecimiento_edificio3 = new EstablecimientoEdificio();
        $establecimiento_edificio3->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS3ST));
        $establecimiento_edificio3->setEstablecimiento($establecimiento3);
        $establecimiento_edificio3->setNombre('Sede Bolívar');
        $establecimiento_edificio3->setCueAnexo('00');
        $establecimiento_edificio3->setTe('4361-8965');
        $establecimiento_edificio3->setMail('ens3st@bue.edu.ar');
        $manager->persist($establecimiento_edificio3);
        $manager->flush();

        // anexo de la ens 3
        $establecimiento_edificio33 = new EstablecimientoEdificio();
        $establecimiento_edificio33->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS3VL));
        $establecimiento_edificio33->setEstablecimiento($establecimiento3);
        $establecimiento_edificio33->setNombre('Anexo Villa Lugano');
        $establecimiento_edificio33->setCueAnexo('01');
        $establecimiento_edificio33->setTe('4602-4206');
        $establecimiento_edificio33->setMail('ens3vl@bue.edu.ar');
        $manager->persist($establecimiento_edificio33);
        $manager->flush();
        /*
         * *****************************************************************************************
         * unidades educativas del la ENS 1
         */
        // inicial de la ens 1
        $unidadEducativa11 = new UnidadEducativa();
        $unidadEducativa11->setDescripcion('Inicial de la ENS1');
        $unidadEducativa11->setEstablecimiento($establecimiento1);
        $unidadEducativa11->setNivel($this->getReference(AppFixNivel::NIVEL_INICIAL));
        $manager->persist($unidadEducativa11);
        $manager->flush();

        $unidadEducativa12 = new UnidadEducativa();
        $unidadEducativa12->setDescripcion('Primaria de la ENS1');
        $unidadEducativa12->setEstablecimiento($establecimiento1);
        $unidadEducativa12->setNivel($this->getReference(AppFixNivel::NIVEL_PRIMARIO));
        $manager->persist($unidadEducativa12);
        $manager->flush();

        $unidadEducativa13 = new UnidadEducativa();
        $unidadEducativa13->setDescripcion('Media de la ENS1');
        $unidadEducativa13->setEstablecimiento($establecimiento1);
        $unidadEducativa13->setNivel($this->getReference(AppFixNivel::NIVEL_SECUNDARIO));
        $manager->persist($unidadEducativa13);
        $manager->flush();

        $unidadEducativa14 = new UnidadEducativa();
        $unidadEducativa14->setDescripcion('Terciario de la ENS1');
        $unidadEducativa14->setEstablecimiento($establecimiento1);
        $unidadEducativa14->setNivel($this->getReference(AppFixNivel::NIVEL_TERCIARIO));
        $manager->persist($unidadEducativa14);
        $manager->flush();

        // inicial de la ens 3
        $unidadEducativa31 = new UnidadEducativa();
        $unidadEducativa31->setDescripcion('Inicial de la ENS3');
        $unidadEducativa31->setEstablecimiento($establecimiento3);
        $unidadEducativa31->setNivel($this->getReference(AppFixNivel::NIVEL_INICIAL));
        $manager->persist($unidadEducativa31);
        $manager->flush();

        $unidadEducativa32 = new UnidadEducativa();
        $unidadEducativa32->setDescripcion('Primaria de la ENS3');
        $unidadEducativa32->setEstablecimiento($establecimiento3);
        $unidadEducativa32->setNivel($this->getReference(AppFixNivel::NIVEL_PRIMARIO));
        $manager->persist($unidadEducativa32);
        $manager->flush();

        $unidadEducativa33 = new UnidadEducativa();
        $unidadEducativa33->setDescripcion('Media de la ENS3');
        $unidadEducativa33->setEstablecimiento($establecimiento3);
        $unidadEducativa33->setNivel($this->getReference(AppFixNivel::NIVEL_SECUNDARIO));
        $manager->persist($unidadEducativa33);
        $manager->flush();

        $unidadEducativa34 = new UnidadEducativa();
        $unidadEducativa34->setDescripcion('Terciario de la ENS3');
        $unidadEducativa34->setEstablecimiento($establecimiento3);
        $unidadEducativa34->setNivel($this->getReference(AppFixNivel::NIVEL_TERCIARIO));
        $manager->persist($unidadEducativa34);
        $manager->flush();

        /*
         * *****************************************************************************************
         * vecinos
         */
        $vecino = new Vecino();
        $vecino->setNombre('Escuela de Comercio Nº 10 Islas Malvinas');
        $vecino->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS1));
        $manager->persist($vecino);
        $manager->flush();

        $vecino = new Vecino();
        $vecino->setNombre('Liceo 4 R. de E. de San Martín');
        $vecino->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS1));
        $manager->persist($vecino);
        $manager->flush();

        $vecino = new Vecino();
        $vecino->setNombre('IES 2 - ENS 2');
        $vecino->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS2));
        $manager->persist($vecino);
        $manager->flush();

        /*
         * *****************************************************************************************
         * localizacion
         */
        // incial en la ens 1
        $localizacion11 = new Localizacion();
        $localizacion11->setEstablecimientoEdificio($establecimiento_edificio1);
        $localizacion11->setUnidadEducativa($unidadEducativa11);
        $manager->persist($localizacion11);

        $localizacion12 = new Localizacion();
        $localizacion12->setEstablecimientoEdificio($establecimiento_edificio1);
        $localizacion12->setUnidadEducativa($unidadEducativa12);
        $manager->persist($localizacion12);

        $localizacion13 = new Localizacion();
        $localizacion13->setEstablecimientoEdificio($establecimiento_edificio1);
        $localizacion13->setUnidadEducativa($unidadEducativa13);
        $manager->persist($localizacion13);

        $localizacion14 = new Localizacion();
        $localizacion14->setEstablecimientoEdificio($establecimiento_edificio1);
        $localizacion14->setUnidadEducativa($unidadEducativa14);
        $manager->persist($localizacion14);

        //inicial en ens 3 st
        $localizacion31 = new Localizacion();
        $localizacion31->setEstablecimientoEdificio($establecimiento_edificio3);
        $localizacion31->setUnidadEducativa($unidadEducativa31);
        $manager->persist($localizacion31);

        $localizacion32 = new Localizacion();
        $localizacion32->setEstablecimientoEdificio($establecimiento_edificio3);
        $localizacion32->setUnidadEducativa($unidadEducativa32);
        $manager->persist($unidadEducativa32);

        $localizacion33 = new Localizacion();
        $localizacion33->setEstablecimientoEdificio($establecimiento_edificio3);
        $localizacion33->setUnidadEducativa($unidadEducativa33);
        $manager->persist($localizacion33);

        $localizacion34 = new Localizacion();
        $localizacion34->setEstablecimientoEdificio($establecimiento_edificio3);
        $localizacion34->setUnidadEducativa($unidadEducativa34);
        $manager->persist($localizacion34);

        // terciario ens 3 VL
        $localizacion334 = new Localizacion();
        $localizacion334->setEstablecimientoEdificio($establecimiento_edificio33);
        $localizacion334->setUnidadEducativa($unidadEducativa34);
        $manager->persist($localizacion334);

        $manager->flush();

        /*
         * *****************************************************************************************
         * domicilio_localizacion
         */
        // inicial en av cordoba
        $domicilio_localizacion11 = new DomicilioLocalizacion();
        $domicilio_localizacion11->setPrincipal(TRUE);
        $domicilio_localizacion11->setDomicilio($domicilio1);
        $domicilio_localizacion11->setLocalizacion($localizacion11);
        $manager->persist($domicilio_localizacion11);

        // terciario en saraza
        $domicilio_localizacion334 = new DomicilioLocalizacion();
        $domicilio_localizacion334->setPrincipal(TRUE);
        $domicilio_localizacion334->setDomicilio($domicilio_ens3vl);
        $domicilio_localizacion334->setLocalizacion($localizacion334);
        $manager->persist($domicilio_localizacion334);

        $manager->flush();
    }

}
