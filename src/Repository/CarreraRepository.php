<?php

namespace App\Repository;

use App\Entity\Carrera;
use App\Entity\Establecimiento;
use App\Entity\EstablecimientoEdificio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Carrera|null find($id, $lockMode = null, $lockVersion = null)
 * @method Carrera|null findOneBy(array $criteria, array $orderBy = null)
 * @method Carrera[]    findAll()
 * @method Carrera[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarreraRepository extends ServiceEntityRepository {

    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Carrera::class);
    }

    /*
     * devuelve todas las carreras de una sede o anexo de un establecimiento
     */

    public function qbCarrerasPorUbicacion(EstablecimientoEdificio $ubicacion) {

        $query = $this->createQueryBuilder('c')
                ->select()
                ->join('c.ofertaEducativa', 'oe')
                ->join('oe.localizaciones', 'loe')
                ->join('loe.localizacion', 'l')
                ->where('l.establecimientoEdificio = :ubicacion');

        $query->setParameter('ubicacion', $ubicacion);
        
        return $query->getQuery();
    }

    public function findCarrerasPorUbicacion(EstablecimientoEdificio $ubicacion) {
        return $this->qbCarrerasPorUbicacion($ubicacion)->getResult();
    }

    // /**
    //  * @return Carrera[] Returns an array of Carrera objects
    //  */
    /*
      public function findByExampleField($value)
      {
      return $this->createQueryBuilder('c')
      ->andWhere('c.exampleField = :val')
      ->setParameter('val', $value)
      ->orderBy('c.id', 'ASC')
      ->setMaxResults(10)
      ->getQuery()
      ->getResult()
      ;
      }
     */

    /*
      public function findOneBySomeField($value): ?Carrera
      {
      return $this->createQueryBuilder('c')
      ->andWhere('c.exampleField = :val')
      ->setParameter('val', $value)
      ->getQuery()
      ->getOneOrNullResult()
      ;
      }
     */
}
