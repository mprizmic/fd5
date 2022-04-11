<?php

namespace App\DataFixtures;

use App\Entity\Comuna;
use App\Entity\Edificio;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class AppFixEdificio extends Fixture {

    private $encoderFactory;

    public const EDIF_SEDE_ENS1 = 'edificio_sede_ens1';
    public const EDIF_SEDE_ENS2 = 'edificio_sede_ens2';
    public const EDIF_SEDE_ENS3ST = 'edificio_sede_ens3st';
    public const EDIF_SEDE_ENS3VL = 'edificio_sede_ens3vl';

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function getDependencies() {
        return [
            AppFixDistritoEscolar::class,
            AppFixBarrio::class,
        ];
    }

    public function load(ObjectManager $manager): void {

        
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
        
        
        $edificio = new Edificio();
        $edificio->setCui('001');
        $edificio->setReferencia('Sede ENS 1');
        $edificio->setComuna($comuna1);
        $edificio->setDistritoEscolar($this->getReference(AppFixDistritoEscolar::DE_1));
        $edificio->setBarrio($this->getReference(AppFixBarrio::BARRIO_PAL));
        $manager->persist($edificio);
        $manager->flush();
        $this->addReference(self::EDIF_SEDE_ENS1, $edificio);
        

        $edificio = new Edificio();
        $edificio->setCui('002');
        $edificio->setReferencia('Sede ENS 2');
        $edificio->setComuna($comuna2);
        $edificio->setDistritoEscolar($this->getReference(AppFixDistritoEscolar::DE_6));
        $manager->persist($edificio);
        $manager->flush();
        $this->addReference(self::EDIF_SEDE_ENS2, $edificio);

        $edificio = new Edificio();
        $edificio->setCui('003');
        $edificio->setReferencia('Sede ENS 3 ST');
        $edificio->setComuna($comuna3);
        $edificio->setDistritoEscolar($this->getReference(AppFixDistritoEscolar::DE_4));
        $edificio->setBarrio($this->getReference(AppFixBarrio::BARRIO_STE));
        $manager->persist($edificio);
        $manager->flush();
        $this->addReference(self::EDIF_SEDE_ENS3ST, $edificio);

        $edificio = new Edificio();
        $edificio->setCui('0033');
        $edificio->setReferencia('Anexo ENS 3 VL');
        $edificio->setComuna($comuna14);
        $edificio->setDistritoEscolar($this->getReference(AppFixDistritoEscolar::DE_4));
        $edificio->setBarrio($this->getReference(AppFixBarrio::BARRIO_VLG));
        $manager->persist($edificio);
        $manager->flush();
        $this->addReference(self::EDIF_SEDE_ENS3VL, $edificio);
    }

}
