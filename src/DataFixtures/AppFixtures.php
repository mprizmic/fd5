<?php

namespace App\DataFixtures;

use App\Entity\Aviso;
use App\Entity\User;
use App\Entity\Vecino;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use App\DataFixtures\AppFixEdificio;

class AppFixtures extends Fixture implements DependentFixtureInterface {

    private $encoderFactory;

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function getDependencies() {
        return [
            AppFixEdificio::class,
        ];
    }

    public function load(ObjectManager $manager): void {
        
        /*
         * *****************************************************************************************
         */
        $aviso = new Aviso();
        $dia = new \DateTime('1/1/2022');
        $dia->format('d/m/Y');        
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

    }

}
