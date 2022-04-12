<?php

/**
 * Limpia la base en el orden indicado y deja sin tocar algunas tablas.
 * 
 * Hay un comando app:limpiar:base que hace DELETE sobre todas las tablas
 *
 * @author marcelo
 */

namespace App\Purger;

use Doctrine\Common\DataFixtures\Purger\PurgerInterface;
use Doctrine\ORM\EntityManagerInterface;

class CustomPurger implements PurgerInterface {

    private $em;
    private $name;

    public function __construct(EntityManagerInterface $em, string $name = 'limpiar_base_purger' ) {
        $this->em = $em;
        $this->name = $name;
    }

    public function purge(): void {
//        $tablas = ['tipo_oferta_educativa', 'domicilio_localizacion', 'localizacion', 'aviso', 'establecimiento_edificio',
//            'vecino', 'domicilio', 'edificio', 'barrio', 'comuna', 'distrito_escolar', 'unidad_educativa',
//            'establecimiento', 'area', 'nivel',
//            'tipo_establecimiento', 'user'];
//
//        foreach ($tablas as $tabla) {
//            $RAW_QUERY = "delete from " . $tabla;
//            $conn = $this->em->getConnection();
//            $conn->executeQuery($RAW_QUERY);
        $connection = $this->em->getConnection();

        try {
            $connection->executeQuery('DELETE FROM AVISO');
            $this->purger->purge();
        } finally {
            $connection->executeQuery('DELETE FROM AVISO');
        }
    }

}
