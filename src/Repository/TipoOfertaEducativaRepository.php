<?php

namespace App\Repository;

use App\Entity\TipoOfertaEducativa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TipoOfertaEducativa|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoOfertaEducativa|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoOfertaEducativa[]    findAll()
 * @method TipoOfertaEducativa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoOfertaEducativaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoOfertaEducativa::class);
    }

    // /**
    //  * @return TipoOfertaEducativa[] Returns an array of TipoOfertaEducativa objects
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
    public function findOneBySomeField($value): ?TipoOfertaEducativa
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
