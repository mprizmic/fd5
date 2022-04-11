<?php

namespace App\DataFixtures;

use App\Entity\UnidadEducativa;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use App\DataFixtures\AppFixEstablecimiento;
use App\DataFixtures\AppFixNivel;

class AppFixUnidadEducativa extends Fixture implements DependentFixtureInterface {

    private $encoderFactory;

    public const UNI_EDU_ENS1_INI = 'uni_edu_ens1_ini';
    public const UNI_EDU_ENS1_PRI = 'uni_edu_ens1_pri';
    public const UNI_EDU_ENS1_SEC = 'uni_edu_ens1_sec';
    public const UNI_EDU_ENS1_TER = 'uni_edu_ens1_ter';
    public const UNI_EDU_ENS3_INI = 'uni_edu_ens3_ini';
    public const UNI_EDU_ENS3_PRI = 'uni_edu_ens3_pri';
    public const UNI_EDU_ENS3_SEC = 'uni_edu_ens3_sec';
    public const UNI_EDU_ENS3_TER = 'uni_edu_ens3_ter';

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function getDependencies() {
        return [
            AppFixEstablecimiento::class,
            AppFixNivel::class,
        ];
    }

    public function load(ObjectManager $manager): void {

        // inicial de la ens 1
        $unidadEducativa = new UnidadEducativa();
        $unidadEducativa->setDescripcion('Inicial de la ENS1');
        $unidadEducativa->setEstablecimiento($this->getReference(AppFixEstablecimiento::ESTAB_ENS1));
        $unidadEducativa->setNivel($this->getReference(AppFixNivel::NIVEL_INICIAL));
        $manager->persist($unidadEducativa);
        $manager->flush();
        $this->addReference(self::UNI_EDU_ENS1_INI, $unidadEducativa);

        $unidadEducativa = new UnidadEducativa();
        $unidadEducativa->setDescripcion('Primaria de la ENS1');
        $unidadEducativa->setEstablecimiento($this->getReference(AppFixEstablecimiento::ESTAB_ENS1));
        $unidadEducativa->setNivel($this->getReference(AppFixNivel::NIVEL_PRIMARIO));
        $manager->persist($unidadEducativa);
        $manager->flush();
        $this->addReference(self::UNI_EDU_ENS1_PRI, $unidadEducativa);

        $unidadEducativa = new UnidadEducativa();
        $unidadEducativa->setDescripcion('Media de la ENS1');
        $unidadEducativa->setEstablecimiento($this->getReference(AppFixEstablecimiento::ESTAB_ENS1));
        $unidadEducativa->setNivel($this->getReference(AppFixNivel::NIVEL_SECUNDARIO));
        $manager->persist($unidadEducativa);
        $manager->flush();
        $this->addReference(self::UNI_EDU_ENS1_SEC, $unidadEducativa);

        $unidadEducativa = new UnidadEducativa();
        $unidadEducativa->setDescripcion('Terciario de la ENS1');
        $unidadEducativa->setEstablecimiento($this->getReference(AppFixEstablecimiento::ESTAB_ENS1));
        $unidadEducativa->setNivel($this->getReference(AppFixNivel::NIVEL_TERCIARIO));
        $manager->persist($unidadEducativa);
        $manager->flush();
        $this->addReference(self::UNI_EDU_ENS1_TER, $unidadEducativa);

        // inicial de la ens 3
        $unidadEducativa = new UnidadEducativa();
        $unidadEducativa->setDescripcion('Inicial de la ENS3');
        $unidadEducativa->setEstablecimiento($this->getReference(AppFixEstablecimiento::ESTAB_ENS3));
        $unidadEducativa->setNivel($this->getReference(AppFixNivel::NIVEL_INICIAL));
        $manager->persist($unidadEducativa);
        $manager->flush();
        $this->addReference(self::UNI_EDU_ENS3_INI, $unidadEducativa);

        $unidadEducativa = new UnidadEducativa();
        $unidadEducativa->setDescripcion('Primaria de la ENS3');
        $unidadEducativa->setEstablecimiento($this->getReference(AppFixEstablecimiento::ESTAB_ENS3));
        $unidadEducativa->setNivel($this->getReference(AppFixNivel::NIVEL_PRIMARIO));
        $manager->persist($unidadEducativa);
        $manager->flush();
        $this->addReference(self::UNI_EDU_ENS3_PRI, $unidadEducativa);

        $unidadEducativa = new UnidadEducativa();
        $unidadEducativa->setDescripcion('Media de la ENS3');
        $unidadEducativa->setEstablecimiento($this->getReference(AppFixEstablecimiento::ESTAB_ENS3));
        $unidadEducativa->setNivel($this->getReference(AppFixNivel::NIVEL_SECUNDARIO));
        $manager->persist($unidadEducativa);
        $manager->flush();
        $this->addReference(self::UNI_EDU_ENS3_SEC, $unidadEducativa);

        $unidadEducativa = new UnidadEducativa();
        $unidadEducativa->setDescripcion('Terciario de la ENS3');
        $unidadEducativa->setEstablecimiento($this->getReference(AppFixEstablecimiento::ESTAB_ENS3));
        $unidadEducativa->setNivel($this->getReference(AppFixNivel::NIVEL_TERCIARIO));
        $manager->persist($unidadEducativa);
        $manager->flush();
        $this->addReference(self::UNI_EDU_ENS3_TER, $unidadEducativa);
    }

}
