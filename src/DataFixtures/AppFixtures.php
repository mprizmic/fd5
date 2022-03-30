<?php

namespace App\DataFixtures;

use App\Entity\Aviso;
use App\Entity\Establecimiento;
use App\Entity\DistritoEscolar;
use App\Entity\TipoEstablecimiento;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
//use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class AppFixtures extends Fixture
{
    private $encoderFactory;

    public function __construct(EncoderFactoryInterface $encoderFactory)
    {
        $this->encoderFactory = $encoderFactory;
    }

    public function load(ObjectManager $manager): void
    {
        $dia = new \DateTime('1/1/2022');
        $dia->format('d/m/Y');
        
        /*
        ******************************************************************************************
        */

        for($i=1;$i<22;$i++){
            $temp = 'distritoEscolar' . $i;
            $$temp = new DistritoEscolar();
            $$temp->setNumero($i);
            $$temp->setNombre(''.$i);
            $manager->persist($$temp);
            $manager->flush();
        }

        /*
        ******************************************************************
        */
        $tipo_establecimiento = new TipoEstablecimiento;
        $tipo_establecimiento->setCodigo('ENS');
        $tipo_establecimiento->setOrden(1);
        $tipo_establecimiento->setDescripcion('Escuela Normal Superior');
        $manager->persist($tipo_establecimiento);
        $manager->flush();
        /*
        ******************************************************************************************
         */
        $establecimiento1 = new Establecimiento();
        $establecimiento1->setCue('001');
        $establecimiento1->setNombre('ENS 1 Roque Saenz Peña');
        $establecimiento1->setApodo('ENS 1');
        $establecimiento1->setNumero(1);
        $establecimiento1->setOrden(1);
        $establecimiento1->setDistritoEscolar($distritoEscolar1);
        $establecimiento1->setTipoEstablecimiento($tipo_establecimiento);
        $manager->persist($establecimiento1);
        $manager->flush();

        $establecimiento2 = new Establecimiento();
        $establecimiento2->setCue('002');
        $establecimiento2->setNombre('ENS 2 Mariano Acosta');
        $establecimiento2->setApodo('ENS 2');
        $establecimiento2->setNumero(2);
        $establecimiento2->setOrden(2);
        $establecimiento2->setDistritoEscolar($distritoEscolar2);
        $establecimiento2->setTipoEstablecimiento($tipo_establecimiento);
        $manager->persist($establecimiento2);
        $manager->flush();
        
        $establecimiento3 = new Establecimiento();
        $establecimiento3->setCue('003');
        $establecimiento3->setNombre('ENS 3 Rivadavia');
        $establecimiento3->setApodo('ENS 3');
        $establecimiento3->setNumero(3);
        $establecimiento3->setOrden(3);
        $establecimiento3->setDistritoEscolar($distritoEscolar2);
        $establecimiento3->setTipoEstablecimiento($tipo_establecimiento);
        $manager->persist($establecimiento3);
        $manager->flush();        
        /*
        ******************************************************************************************
         */
        $aviso = new Aviso();
        $aviso->setFecha($dia);
        $aviso->setDescripcion('en desarrollo');
        $aviso->setActivo(true);
        $manager->persist($aviso);
        $manager->flush();
        
        /*
        ******************************************************************************************
         */
        $user1 = new User();
        $user1->setEmail('mprizmic@gmail.com');
        $user1->setUsername('marcelo');
        $user1->setRoles(array('ROLE_USER','ROLE_SUPER_ADMIN', 'ROLE_ADMIN'));

        $user1->setPassword($this->encoderFactory->getEncoder(User::class)->encodePassword('123', null));

        $manager->persist($user1);
            
        $user2 = new User();
        $user2->setEmail('otro@otro.com');
        $user2->setUsername('otro');
        $user2->setRoles(array('ROLE_USER'));

        $user2->setPassword($this->encoderFactory->getEncoder(User::class)->encodePassword('123', null));

        $manager->persist($user2);
        $manager->flush();
        
                
    }
}
