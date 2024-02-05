<?php

namespace App\Repository;

use App\Entity\FiscalPower;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FiscalPower>
 *
 * @method FiscalPower|null find($id, $lockMode = null, $lockVersion = null)
 * @method FiscalPower|null findOneBy(array $criteria, array $orderBy = null)
 * @method FiscalPower[]    findAll()
 * @method FiscalPower[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FiscalPowerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FiscalPower::class);
    }

//    /**
//     * @return FiscalPower[] Returns an array of FiscalPower objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FiscalPower
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
