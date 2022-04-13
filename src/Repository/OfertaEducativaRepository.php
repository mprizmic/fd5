<?php

namespace App\Repository;

use App\Entity\OfertaEducativa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OfertaEducativa|null find($id, $lockMode = null, $lockVersion = null)
 * @method OfertaEducativa|null findOneBy(array $criteria, array $orderBy = null)
 * @method OfertaEducativa[]    findAll()
 * @method OfertaEducativa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfertaEducativaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OfertaEducativa::class);
    }

    // /**
    //  * @return OfertaEducativa[] Returns an array of OfertaEducativa objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OfertaEducativa
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
