<?php

namespace App\Repository;

use App\Entity\CicloPedagogico;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CicloPedagogico|null find($id, $lockMode = null, $lockVersion = null)
 * @method CicloPedagogico|null findOneBy(array $criteria, array $orderBy = null)
 * @method CicloPedagogico[]    findAll()
 * @method CicloPedagogico[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CicloPedagogicoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CicloPedagogico::class);
    }

    // /**
    //  * @return CicloPedagogico[] Returns an array of CicloPedagogico objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CicloPedagogico
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
