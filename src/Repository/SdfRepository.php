<?php

namespace App\Repository;

use App\Entity\Sdf;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sdf|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sdf|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sdf[]    findAll()
 * @method Sdf[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SdfRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sdf::class);
    }

    // /**
    //  * @return Sdf[] Returns an array of Sdf objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sdf
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
