<?php

namespace App\DataFixtures;

use App\Entity\DistritoEscolar;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class AppFixDistritoEscolar extends Fixture {

    private $encoderFactory;

    public const DE_1 = 'DE_1';
    public const DE_2 = 'DE_2';
    public const DE_3 = 'DE_3';
    public const DE_4 = 'DE_4';
    public const DE_5 = 'DE_5';
    public const DE_6 = 'DE_6';
    public const DE_7 = 'DE_7';
    public const DE_8 = 'DE_8';
    public const DE_9 = 'DE_9';
    public const DE_10 = 'DE_10';
    public const DE_11 = 'DE_11';
    public const DE_12 = 'DE_12';
    public const DE_13 = 'DE_13';
    public const DE_14 = 'DE_14';
    public const DE_15 = 'DE_15';
    public const DE_16 = 'DE_16';

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function load(ObjectManager $manager): void {

        $i = 1;
        $de = new DistritoEscolar();
        $de->setNumero($i);
        $de->setNombre('' . $i);
        $manager->persist($de);
        $manager->flush();
        $this->addReference(self::DE_1, $de);
        
        $i += 1;
        $de = new DistritoEscolar();
        $de->setNumero($i);
        $de->setNombre('' . $i);
        $manager->persist($de);
        $manager->flush();
        $this->addReference(self::DE_2, $de);

        $i += 1;
        $de = new DistritoEscolar();
        $de->setNumero($i);
        $de->setNombre('' . $i);
        $manager->persist($de);
        $manager->flush();
        $this->addReference(self::DE_3, $de);

        $i += 1;
        $de = new DistritoEscolar();
        $de->setNumero($i);
        $de->setNombre('' . $i);
        $manager->persist($de);
        $manager->flush();
        $this->addReference(self::DE_4, $de);

        $i += 1;
        $de = new DistritoEscolar();
        $de->setNumero($i);
        $de->setNombre('' . $i);
        $manager->persist($de);
        $manager->flush();
        $this->addReference(self::DE_5, $de);

        $i += 1;
        $de = new DistritoEscolar();
        $de->setNumero($i);
        $de->setNombre('' . $i);
        $manager->persist($de);
        $manager->flush();
        $this->addReference(self::DE_6, $de);

        $i += 1;
        $de = new DistritoEscolar();
        $de->setNumero($i);
        $de->setNombre('' . $i);
        $manager->persist($de);
        $manager->flush();
        $this->addReference(self::DE_7, $de);

        $i += 1;
        $de = new DistritoEscolar();
        $de->setNumero($i);
        $de->setNombre('' . $i);
        $manager->persist($de);
        $manager->flush();
        $this->addReference(self::DE_8, $de);

        $i += 1;
        $de = new DistritoEscolar();
        $de->setNumero($i);
        $de->setNombre('' . $i);
        $manager->persist($de);
        $manager->flush();
        $this->addReference(self::DE_9, $de);

        $i += 1;
        $de = new DistritoEscolar();
        $de->setNumero($i);
        $de->setNombre('' . $i);
        $manager->persist($de);
        $manager->flush();
        $this->addReference(self::DE_10, $de);

        $i += 1;
        $de = new DistritoEscolar();
        $de->setNumero($i);
        $de->setNombre('' . $i);
        $manager->persist($de);
        $manager->flush();
        $this->addReference(self::DE_11, $de);

        $i += 1;
        $de = new DistritoEscolar();
        $de->setNumero($i);
        $de->setNombre('' . $i);
        $manager->persist($de);
        $manager->flush();
        $this->addReference(self::DE_12, $de);

        $i += 1;
        $de = new DistritoEscolar();
        $de->setNumero($i);
        $de->setNombre('' . $i);
        $manager->persist($de);
        $manager->flush();
        $this->addReference(self::DE_13, $de);

        $i += 1;
        $de = new DistritoEscolar();
        $de->setNumero($i);
        $de->setNombre('' . $i);
        $manager->persist($de);
        $manager->flush();
        $this->addReference(self::DE_14, $de);

        $i += 1;
        $de = new DistritoEscolar();
        $de->setNumero($i);
        $de->setNombre('' . $i);
        $manager->persist($de);
        $manager->flush();
        $this->addReference(self::DE_15, $de);

        $i += 1;
        $de = new DistritoEscolar();
        $de->setNumero($i);
        $de->setNombre('' . $i);
        $manager->persist($de);
        $manager->flush();
        $this->addReference(self::DE_16, $de);
      
    }

}
