<?php

namespace App\Repository;

use App\Entity\LocalizacionOE;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LocalizacionOE|null find($id, $lockMode = null, $lockVersion = null)
 * @method LocalizacionOE|null findOneBy(array $criteria, array $orderBy = null)
 * @method LocalizacionOE[]    findAll()
 * @method LocalizacionOE[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocalizacionOERepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LocalizacionOE::class);
    }

    // /**
    //  * @return LocalizacionOE[] Returns an array of LocalizacionOE objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LocalizacionOE
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
