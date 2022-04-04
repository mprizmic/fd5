<?php

namespace App\Repository;

use App\Entity\UnidadEducativa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UnidadEducativa|null find($id, $lockMode = null, $lockVersion = null)
 * @method UnidadEducativa|null findOneBy(array $criteria, array $orderBy = null)
 * @method UnidadEducativa[]    findAll()
 * @method UnidadEducativa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UnidadEducativaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UnidadEducativa::class);
    }

    // /**
    //  * @return UnidadEducativa[] Returns an array of UnidadEducativa objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UnidadEducativa
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
