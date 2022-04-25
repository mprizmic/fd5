<?php

namespace App\DataFixtures;

use App\Entity\OfertaEducativa;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use App\DataFixtures\AppFixTipoOE;

class AppFixOfertaEducativa extends Fixture implements DependentFixtureInterface {

    private $encoderFactory;

    public const OE_INICIAL  = 'oferta_inicial';
    public const OE_PRIMARIA = 'oferta_primaria';
    public const OE_NES      = 'oferta_nes';
    public const OE_SEC_FUT  = 'oferta_sec_fut';
    public const OE_CAR_PEI    = 'oferta_car_pei';
    public const OE_CAR_PEP    = 'oferta_car_pep';
    public const OE_CAR_TSG    = 'oferta_car_tsg';
    public const OE_POST     = 'oferta_postitulo';

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function getDependencies() {
        return [
            AppFixTipoOE::class,
            AppFixCarrera::class,
            AppFixInicial::class,
            AppFixSdf::class,
        ];
    }

    public function load(ObjectManager $manager): void {

        $oe = new OfertaEducativa();
        $oe->setTipo($this->getReference(AppFixTipoOE::TIPO_OE_INICIAL));
        $oe->setInicial($this->getReference(AppFixInicial::INI_COM));
        $manager->persist($oe);
        $manager->flush();
        $this->addReference(self::OE_INICIAL, $oe);

        $oe = new OfertaEducativa();
        $oe->setTipo($this->getReference(AppFixTipoOE::TIPO_OE_CAR));
        $oe->setCarrera($this->getReference(AppFixCarrera::CAR_PEI));
        $manager->persist($oe);
        $manager->flush();
        $this->addReference(self::OE_CAR_PEI, $oe);

        $oe = new OfertaEducativa();
        $oe->setTipo($this->getReference(AppFixTipoOE::TIPO_OE_CAR));
        $oe->setCarrera($this->getReference(AppFixCarrera::CAR_PEP));
        $manager->persist($oe);
        $manager->flush();
        $this->addReference(self::OE_CAR_PEP, $oe);

        $oe = new OfertaEducativa();
        $oe->setTipo($this->getReference(AppFixTipoOE::TIPO_OE_CAR));
        $oe->setCarrera($this->getReference(AppFixCarrera::CAR_TSG));
        $manager->persist($oe);
        $manager->flush();
        $this->addReference(self::OE_CAR_TSG, $oe);

        $oe = new OfertaEducativa();
        $oe->setTipo($this->getReference(AppFixTipoOE::TIPO_OE_SEC_FUT));
        $oe->setSdf($this->getReference(AppFixSdf::SDF_COM));
        $manager->persist($oe);
        $manager->flush();
        $this->addReference(self::OE_SEC_FUT, $oe);
    }

}
