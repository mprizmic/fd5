<?php

namespace App\DataFixtures;

use App\Entity\Aviso;
use App\Entity\Establecimiento;
use App\Entity\DistritoEscolar;
use App\Entity\TipoEstablecimiento;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ManagerRegistry;
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
        /*
        ******************************************************************************************
         */
        $aviso = new Aviso();
        $aviso->setFecha($dia);
        $aviso->setDescripcion('en desarrollo');
        $aviso->setActivo(true);
        $manager->persist($aviso);
        $manager->flush();
                
    }
}
