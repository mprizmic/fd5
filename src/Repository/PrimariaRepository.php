<?php

namespace App\Repository;

use App\Entity\Primaria;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Primaria|null find($id, $lockMode = null, $lockVersion = null)
 * @method Primaria|null findOneBy(array $criteria, array $orderBy = null)
 * @method Primaria[]    findAll()
 * @method Primaria[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrimariaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Primaria::class);
    }

    // /**
    //  * @return Primaria[] Returns an array of Primaria objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Primaria
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
