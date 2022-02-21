<?php

namespace App\Repository;

use App\Entity\TipoEstablecimiento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TipoEstablecimiento|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoEstablecimiento|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoEstablecimiento[]    findAll()
 * @method TipoEstablecimiento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoEstablecimientoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoEstablecimiento::class);
    }

    // /**
    //  * @return TipoEstablecimiento[] Returns an array of TipoEstablecimiento objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TipoEstablecimiento
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
