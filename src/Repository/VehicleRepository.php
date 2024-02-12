<?php

namespace App\Repository;

use App\Entity\Vehicle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Vehicle>
 *
 * @method Vehicle|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vehicle|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vehicle[]    findAll()
 * @method Vehicle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehicleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vehicle::class);
    }

    //    /**
    //     * @return Vehicle[] Returns an array of Vehicle objects
    //     */
    public function findByCriterias(array $value): array
    {
        $qb = $this->createQueryBuilder('v');

        if (isset($value['priceMin']) && isset($value['priceMax'])) {
            $qb->andWhere($qb->expr()->between('v.price', ':priceMin', ':priceMax'))
                ->setParameter('priceMin', $value['priceMin'])
                ->setParameter('priceMax', $value['priceMax']);
        }

        if (isset($value['kmMin']) && isset($value['kmMax'])) {
            $qb->andWhere($qb->expr()->between('v.kilometer', ':kmMin', ':kmMax'))
                ->setParameter('kmMin', $value['kmMin'])
                ->setParameter('kmMax', $value['kmMax']);
        }

        if (isset($value['yearMin']) && isset($value['yearMax'])) {
            $qb->andWhere($qb->expr()->between('v.year', ':yearMin', ':yearMax'))
                ->setParameter('yearMin', $value['yearMin'] . '-01-01')
                ->setParameter('yearMax', ($value['yearMax'] + 1) . '-01-01');
        }

        return $qb->orderBy('v.price', 'ASC')->getQuery()->getResult();
    }

    //    public function findOneBySomeField($value): ?Vehicle
    //    {
    //        return $this->createQueryBuilder('v')
    //            ->andWhere('v.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
