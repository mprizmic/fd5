<?php

namespace App\DataFixtures;

use App\Entity\Aviso;
use App\Entity\Comuna;
use App\Entity\Establecimiento;
use App\Entity\DistritoEscolar;
use App\Entity\Nivel;
use App\Entity\TipoEstablecimiento;
use App\Entity\UnidadEducativa;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
//use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class AppFixtures extends Fixture {

    private $encoderFactory;

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function load(ObjectManager $manager): void {
        $dia = new \DateTime('1/1/2022');
        $dia->format('d/m/Y');

        /*
         * *****************************************************************************************
         */
        $nivel1 = new Nivel();
        $nivel1->setNombre('Inicial');
        $nivel1->setAbreviatura('Ini');
        $nivel1->setOrden(1);
        $manager->persist($nivel1);
        $manager->flush();

        $nivel2 = new Nivel();
        $nivel2->setNombre('Primario');
        $nivel2->setAbreviatura('Pri');
        $nivel2->setOrden(2);
        $manager->persist($nivel2);
        $manager->flush();

        $nivel3 = new Nivel();
        $nivel3->setNombre('Medio');
        $nivel3->setAbreviatura('Med');
        $nivel3->setOrden(3);
        $manager->persist($nivel3);
        $manager->flush();

        $nivel4 = new Nivel();
        $nivel4->setNombre('Terciario');
        $nivel4->setAbreviatura('Ter');
        $nivel4->setOrden(4);
        $manager->persist($nivel4);
        $manager->flush();

        /*
         * *****************************************************************************************
         * distrito escolar
         */

        for ($i = 1; $i < 22; $i++) {
            $temp = 'distritoEscolar' . $i;
            $$temp = new DistritoEscolar();
            $$temp->setNumero($i);
            $$temp->setNombre('' . $i);
            $manager->persist($$temp);
            $manager->flush();
        }
        /*
         * *****************************************************************************************
         * comunas
         */

        for ($i = 1; $i < 17; $i++) {
            $temp = 'comuna' . $i;
            $$temp = new Comuna();
            $$temp->setNumero($i);
            $manager->persist($$temp);
            $manager->flush();
        }

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
//        $establecimiento1->setDistritoEscolar($distritoEscolar1);
        $establecimiento1->setTipoEstablecimiento($tipo_establecimiento);
        $manager->persist($establecimiento1);
        $manager->flush();

        $establecimiento2 = new Establecimiento();
        $establecimiento2->setCue('002');
        $establecimiento2->setNombre('ENS 2 M Acosta');
        $establecimiento2->setApodo('ENS 2');
        $establecimiento2->setNumero(2);
        $establecimiento2->setOrden(2);
//        $establecimiento2->setDistritoEscolar($distritoEscolar2);
        $establecimiento2->setTipoEstablecimiento($tipo_establecimiento);
        $manager->persist($establecimiento2);
        $manager->flush();

        $establecimiento3 = new Establecimiento();
        $establecimiento3->setCue('003');
        $establecimiento3->setNombre('ENS 3 Rivadavia');
        $establecimiento3->setApodo('ENS 3');
        $establecimiento3->setNumero(3);
        $establecimiento3->setOrden(3);
//        $establecimiento3->setDistritoEscolar($distritoEscolar2);
        $establecimiento3->setTipoEstablecimiento($tipo_establecimiento);
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
        $edificio1 = new \App\Entity\Edificio();
        $edificio1->setCui('001');
        $edificio1->setReferencia('ENS 1 Roque Saenz Peña');
        $edificio1->setComuna($comuna1);
//        $establecimiento1->setDistritoEscolar($distritoEscolar1);
        $manager->persist($edificio1);
        $manager->flush();

        $edificio2 = new \App\Entity\Edificio();
        $edificio2->setCui('002');
        $edificio2->setReferencia('ENS 2 Mariano Acosta');
        $edificio2->setComuna($comuna2);
//        $establecimiento1->setDistritoEscolar($distritoEscolar1);
        $manager->persist($edificio2);
        $manager->flush();

        $edificio3 = new \App\Entity\Edificio();
        $edificio3->setCui('003');
        $edificio3->setReferencia('ENS 3 Rivadavia');
        $edificio3->setComuna($comuna3);
//        $establecimiento1->setDistritoEscolar($distritoEscolar1);
        $manager->persist($edificio3);
        $manager->flush();

        /*
         * *****************************************************************************************
         * unidades educativas del la ENS 1
         */

        $unidadEducativa = new \App\Entity\UnidadEducativa();
        $unidadEducativa->setDescripcion('Inicial de la ENS1');
        $unidadEducativa->setEstablecimiento($establecimiento1);
        $unidadEducativa->setNivel($nivel1);
        $manager->persist($unidadEducativa);
        $manager->flush();

        $unidadEducativa = new \App\Entity\UnidadEducativa();
        $unidadEducativa->setDescripcion('Primaria de la ENS1');
        $unidadEducativa->setEstablecimiento($establecimiento1);
        $unidadEducativa->setNivel($nivel2);
        $manager->persist($unidadEducativa);
        $manager->flush();

        $unidadEducativa = new \App\Entity\UnidadEducativa();
        $unidadEducativa->setDescripcion('Media de la ENS1');
        $unidadEducativa->setEstablecimiento($establecimiento1);
        $unidadEducativa->setNivel($nivel3);
        $manager->persist($unidadEducativa);
        $manager->flush();

        $unidadEducativa = new \App\Entity\UnidadEducativa();
        $unidadEducativa->setDescripcion('Terciario de la ENS1');
        $unidadEducativa->setEstablecimiento($establecimiento1);
        $unidadEducativa->setNivel($nivel4);
        $manager->persist($unidadEducativa);
        $manager->flush();

        $vecino = new \App\Entity\Vecino();
        $vecino->setNombre('Escuela de Comercio Nº 10 Islas Malvinas');
        $vecino->setEdificio($edificio1);
        $manager->persist($vecino);
        $manager->flush();

        $vecino = new \App\Entity\Vecino();
        $vecino->setNombre('Liceo 4 R. de E. de San Martín');
        $vecino->setEdificio($edificio1);
        $manager->persist($vecino);
        $manager->flush();

        $vecino = new \App\Entity\Vecino();
        $vecino->setNombre('IES 2 - ENS 2');
        $vecino->setEdificio($edificio2);
        $manager->persist($vecino);
        $manager->flush();
    }

}
