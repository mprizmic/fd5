<?php

namespace App\Repository;

use App\Entity\Barrio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Barrio|null find($id, $lockMode = null, $lockVersion = null)
 * @method Barrio|null findOneBy(array $criteria, array $orderBy = null)
 * @method Barrio[]    findAll()
 * @method Barrio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BarrioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Barrio::class);
    }

    // /**
    //  * @return Barrio[] Returns an array of Barrio objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Barrio
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
