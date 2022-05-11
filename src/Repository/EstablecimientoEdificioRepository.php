<?php

namespace App\Repository;

use App\Entity\EstablecimientoEdificio;
use App\Entity\Nivel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EstablecimientoEdificio|null find($id, $lockMode = null, $lockVersion = null)
 * @method EstablecimientoEdificio|null findOneBy(array $criteria, array $orderBy = null)
 * @method EstablecimientoEdificio[]    findAll()
 * @method EstablecimientoEdificio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EstablecimientoEdificioRepository extends ServiceEntityRepository {

    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, EstablecimientoEdificio::class);
    }

    /**
     * Devuelve los turnos en que se imparte un nivel (una unidad educativa del establecimiento) en la sede
     * @param Nivel $nivel
     */
    public function qbTurnosNivel(EstablecimientoEdificio $establecimiento_edificio, Nivel $nivel) {
        $query = $this->createQueryBuilder()
                ->select('t.codigo')
                ->from('App:Nivel', 'n')
                ->innerJoin('n.tiposOfertasEducativas', 'toe')
                ->innerJoin('toe.ofertasEducativas', 'oe')
                ->innerJoin('oe.localizaciones', 'loe')
                ->innerJoin('loe.localizacion', 'loc')
                ->innerJoin('loc.establecimientoEdificio', 'ee')
                ->innerJoin('loe.turnos', 'ts')
                ->innerJoin('ts.turno', 't')
                ->andWhere('n.abreviatura = :abreviatura')
                ->andWhere('ee.id = :anexo')
                ->setParameter('abreviatura', $nivel->getAbreviatura())
                ->setParameter('anexo', $establecimiento_edificio->getId());

        return $query;
    }

    public function findTurnosNivel(EstablecimientoEdificio $establecimiento_edificio, Nivel $nivel) {
        return $this->qbTurnosNivel($establecimiento_edificio, $nivel)->getQuery()->getResult();
    }

    // /**
    //  * @return EstablecimientoEdificio[] Returns an array of EstablecimientoEdificio objects
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
      public function findOneBySomeField($value): ?EstablecimientoEdificio
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
