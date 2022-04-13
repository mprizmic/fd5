<?php

namespace App\Repository;

use App\Entity\TipoFormacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TipoFormacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoFormacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoFormacion[]    findAll()
 * @method TipoFormacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoFormacionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoFormacion::class);
    }

    // /**
    //  * @return TipoFormacion[] Returns an array of TipoFormacion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TipoFormacion
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
