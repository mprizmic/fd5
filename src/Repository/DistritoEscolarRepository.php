<?php

namespace App\Repository;

use App\Entity\DistritoEscolar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DistritoEscolar|null find($id, $lockMode = null, $lockVersion = null)
 * @method DistritoEscolar|null findOneBy(array $criteria, array $orderBy = null)
 * @method DistritoEscolar[]    findAll()
 * @method DistritoEscolar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DistritoEscolarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DistritoEscolar::class);
    }

    // /**
    //  * @return DistritoEscolar[] Returns an array of DistritoEscolar objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DistritoEscolar
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
