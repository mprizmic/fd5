<?php

namespace App\DataFixtures;

use App\Entity\TipoOfertaEducativa;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use App\DataFixtures\AppFixNivel;

class AppFixTipoOE extends Fixture implements DependentFixtureInterface {

    private $encoderFactory;

    public const TIPO_OE_INICIAL = 'oferta_inicial';
    public const TIPO_OE_PRIMARIA = 'oferta_primaria';
    public const TIPO_OE_NES = 'oferta_nes';
    public const TIPO_OE_SEC_FUT = 'oferta_sec_fut';
    public const TIPO_OE_CARFD = 'oferta_car_fd';
    public const TIPO_OE_CARFT = 'oferta_car_ft';
    public const TIPO_OE_POST = 'oferta_postitulo';

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function getDependencies() {
        return [
            AppFixNivel::class,
        ];
    }

    public function load(ObjectManager $manager): void {

        $tipo_oe = new TipoOfertaEducativa();
        $tipo_oe->setCodigo('INI');
        $tipo_oe->setDescripcion('Jardín de infantes');
        $tipo_oe->setNivel($this->getReference(AppFixNivel::NIVEL_INICIAL));
        $manager->persist($tipo_oe);
        $manager->flush();

        $this->addReference(self::TIPO_OE_INICIAL, $tipo_oe);

        $tipo_oe = new TipoOfertaEducativa();
        $tipo_oe->setCodigo('PRI');
        $tipo_oe->setDescripcion('Primaria común');
        $tipo_oe->setNivel($this->getReference(AppFixNivel::NIVEL_PRIMARIO));
        $manager->persist($tipo_oe);
        $manager->flush();

        $this->addReference(self::TIPO_OE_PRIMARIA, $tipo_oe);

        $tipo_oe = new TipoOfertaEducativa();
        $tipo_oe->setCodigo('NES');
        $tipo_oe->setDescripcion('Nueva escuela secundaria');
        $tipo_oe->setNivel($this->getReference(AppFixNivel::NIVEL_SECUNDARIO));
        $manager->persist($tipo_oe);
        $manager->flush();
        $this->addReference(self::TIPO_OE_NES, $tipo_oe);

        $tipo_oe = new TipoOfertaEducativa();
        $tipo_oe->setCodigo('SDF');
        $tipo_oe->setDescripcion('Secundaria del futuro');
        $tipo_oe->setNivel($this->getReference(AppFixNivel::NIVEL_SECUNDARIO));
        $manager->persist($tipo_oe);
        $manager->flush();
        $this->addReference(self::TIPO_OE_SEC_FUT, $tipo_oe);

        $tipo_oe = new TipoOfertaEducativa();
        $tipo_oe->setCodigo('CARFD');
        $tipo_oe->setDescripcion('Carrera terciaria de formación docente');
        $tipo_oe->setNivel($this->getReference(AppFixNivel::NIVEL_TERCIARIO));
        $manager->persist($tipo_oe);
        $manager->flush();
        $this->addReference(self::TIPO_OE_CARFD, $tipo_oe);

        $tipo_oe = new TipoOfertaEducativa();
        $tipo_oe->setCodigo('CARFT');
        $tipo_oe-> setDescripcion('Carrera terciaria de formación técnica');
        $tipo_oe->setNivel($this->getReference(AppFixNivel::NIVEL_TERCIARIO));
        $manager->persist($tipo_oe);
        $manager->flush();
        $this->addReference(self::TIPO_OE_CARFT, $tipo_oe);

        $tipo_oe = new TipoOfertaEducativa();
        $tipo_oe->setCodigo('POST');
        $tipo_oe->setDescripcion('Postítulo');
        $tipo_oe->setNivel($this->getReference(AppFixNivel::NIVEL_TERCIARIO));
        $manager->persist($tipo_oe);
        $manager->flush();
        $this->addReference(self::TIPO_OE_POST, $tipo_oe);
    }

}
