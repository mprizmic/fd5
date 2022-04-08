<?php

namespace App\Repository;

use App\Entity\DomicilioLocalizacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DomicilioLocalizacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method DomicilioLocalizacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method DomicilioLocalizacion[]    findAll()
 * @method DomicilioLocalizacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DomicilioLocalizacionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DomicilioLocalizacion::class);
    }

    // /**
    //  * @return DomicilioLocalizacion[] Returns an array of DomicilioLocalizacion objects
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
    public function findOneBySomeField($value): ?DomicilioLocalizacion
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
