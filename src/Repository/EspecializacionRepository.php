<?php

namespace App\Repository;

use App\Entity\Especializacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Especializacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Especializacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Especializacion[]    findAll()
 * @method Especializacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EspecializacionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Especializacion::class);
    }

    // /**
    //  * @return Especializacion[] Returns an array of Especializacion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Especializacion
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
