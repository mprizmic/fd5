<?php

namespace App\Repository;

use App\Entity\EstablecimientoEdificio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EstablecimientoEdificio|null find($id, $lockMode = null, $lockVersion = null)
 * @method EstablecimientoEdificio|null findOneBy(array $criteria, array $orderBy = null)
 * @method EstablecimientoEdificio[]    findAll()
 * @method EstablecimientoEdificio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EstablecimientoEdificioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EstablecimientoEdificio::class);
    }

    // /**
    //  * @return EstablecimientoEdificio[] Returns an array of EstablecimientoEdificio objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EstablecimientoEdificio
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
