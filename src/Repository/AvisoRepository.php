<?php

namespace App\Repository;

use App\Entity\Aviso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Aviso|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aviso|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aviso[]    findAll()
 * @method Aviso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvisoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aviso::class);
    }

    // /**
    //  * @return Aviso[] Returns an array of Aviso objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Aviso
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
