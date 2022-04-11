<?php

namespace App\DataFixtures;

use App\Entity\Aviso;
use App\Entity\DomicilioLocalizacion;
use App\Entity\EstablecimientoEdificio;
use App\Entity\Localizacion;
use App\Entity\TipoEstablecimiento;
use App\Entity\User;
use App\Entity\Vecino;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use App\DataFixtures\AppFixArea;
use App\DataFixtures\AppFixBarrio;
use App\DataFixtures\AppFixDistritoEscolar;
use App\DataFixtures\AppFixDomicilio;
use App\DataFixtures\AppFixEdificio;
use App\DataFixtures\AppFixEstablecimiento;
use App\DataFixtures\AppFixNivel;
use App\DataFixtures\AppFixUnidadEducativa;

class AppFixtures extends Fixture implements DependentFixtureInterface {

    private $encoderFactory;

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function getDependencies() {
        return [
            AppFixArea::class,
            AppFixBarrio::class,
            AppFixEdificio::class,
            AppFixEstablecimiento::class,
            AppFixDomicilio::class,
            AppFixDistritoEscolar::class,
            AppFixNivel::class,
            AppFixUnidadEducativa::class,
        ];
    }

    public function load(ObjectManager $manager): void {

        $dia = new \DateTime('1/1/2022');
        $dia->format('d/m/Y');

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
         * establecimiento_edificio
         */
        // sede de la ens 1
        $establecimiento_edificio1 = new EstablecimientoEdificio();
        $establecimiento_edificio1->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS1));
        $establecimiento_edificio1->setEstablecimiento($this->getReference(AppFixEstablecimiento::ESTAB_ENS1));
        $establecimiento_edificio1->setNombre('Sede Av. Córdoba');
        $establecimiento_edificio1->setCueAnexo('00');
        $manager->persist($establecimiento_edificio1);
        $manager->flush();

        // sede de la ens 3
        $establecimiento_edificio3 = new EstablecimientoEdificio();
        $establecimiento_edificio3->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS3ST));
        $establecimiento_edificio3->setEstablecimiento($this->getReference(AppFixEstablecimiento::ESTAB_ENS3));
        $establecimiento_edificio3->setNombre('Sede Bolívar');
        $establecimiento_edificio3->setCueAnexo('00');
        $establecimiento_edificio3->setTe('4361-8965');
        $establecimiento_edificio3->setMail('ens3st@bue.edu.ar');
        $manager->persist($establecimiento_edificio3);
        $manager->flush();

        // anexo de la ens 3
        $establecimiento_edificio33 = new EstablecimientoEdificio();
        $establecimiento_edificio33->setEdificio($this->getReference(AppFixEdificio::EDIF_SEDE_ENS3VL));
        $establecimiento_edificio33->setEstablecimiento($this->getReference(AppFixEstablecimiento::ESTAB_ENS3));
        $establecimiento_edificio33->setNombre('Anexo Villa Lugano');
        $establecimiento_edificio33->setCueAnexo('01');
        $establecimiento_edificio33->setTe('4602-4206');
        $establecimiento_edificio33->setMail('ens3vl@bue.edu.ar');
        $manager->persist($establecimiento_edificio33);
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
        $localizacion = new Localizacion();
        $localizacion->setEstablecimientoEdificio($establecimiento_edificio1);
        $localizacion->setUnidadEducativa($this->getReference(AppFixUnidadEducativa::UNI_EDU_ENS1_INI));
        $manager->persist($localizacion);

        $localizacion = new Localizacion();
        $localizacion->setEstablecimientoEdificio($establecimiento_edificio1);
        $localizacion->setUnidadEducativa($this->getReference(AppFixUnidadEducativa::UNI_EDU_ENS1_PRI));
        $manager->persist($localizacion);

        $localizacion = new Localizacion();
        $localizacion->setEstablecimientoEdificio($establecimiento_edificio1);
        $localizacion->setUnidadEducativa($this->getReference(AppFixUnidadEducativa::UNI_EDU_ENS1_SEC));
        $manager->persist($localizacion);

        $localizacion = new Localizacion();
        $localizacion->setEstablecimientoEdificio($establecimiento_edificio1);
        $localizacion->setUnidadEducativa($this->getReference(AppFixUnidadEducativa::UNI_EDU_ENS1_TER));
        $manager->persist($localizacion);

        //inicial en ens 3 st
        $localizacion = new Localizacion();
        $localizacion->setEstablecimientoEdificio($establecimiento_edificio3);
        $localizacion->setUnidadEducativa($this->getReference(AppFixUnidadEducativa::UNI_EDU_ENS3_INI));
        $manager->persist($localizacion);

        $localizacion = new Localizacion();
        $localizacion->setEstablecimientoEdificio($establecimiento_edificio3);
        $localizacion->setUnidadEducativa($this->getReference(AppFixUnidadEducativa::UNI_EDU_ENS3_PRI));
        $manager->persist($localizacion);

        $localizacion = new Localizacion();
        $localizacion->setEstablecimientoEdificio($establecimiento_edificio3);
        $localizacion->setUnidadEducativa($this->getReference(AppFixUnidadEducativa::UNI_EDU_ENS3_SEC));
        $manager->persist($localizacion);

        $localizacion = new Localizacion();
        $localizacion->setEstablecimientoEdificio($establecimiento_edificio3);
        $localizacion->setUnidadEducativa($this->getReference(AppFixUnidadEducativa::UNI_EDU_ENS3_TER));
        $manager->persist($localizacion);

        // terciario ens 3 VL
        $localizacion = new Localizacion();
        $localizacion->setEstablecimientoEdificio($establecimiento_edificio33);
        $localizacion->setUnidadEducativa($this->getReference(AppFixUnidadEducativa::UNI_EDU_ENS3_TER));
        $manager->persist($localizacion);

        $manager->flush();

        /*
         * *****************************************************************************************
         * domicilio_localizacion
         */
        // inicial en av cordoba
        $domicilio_localizacion11 = new DomicilioLocalizacion();
        $domicilio_localizacion11->setPrincipal(TRUE);
        $domicilio_localizacion11->setDomicilio($this->getReference(AppFixDomicilio::DOMIC_SEDE_ENS1_1));
        $domicilio_localizacion11->setLocalizacion($localizacion11);
        $manager->persist($domicilio_localizacion11);

        // terciario en saraza
        $domicilio_localizacion334 = new DomicilioLocalizacion();
        $domicilio_localizacion334->setPrincipal(TRUE);
        $domicilio_localizacion334->setDomicilio($this->getReference(AppFixDomicilio::DOMIC_SEDE_ENS3VL));
        $domicilio_localizacion334->setLocalizacion($localizacion334);
        $manager->persist($domicilio_localizacion334);

        $manager->flush();
    }

}
