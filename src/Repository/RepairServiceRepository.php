<?php

namespace App\Repository;

use App\Entity\RepairService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RepairService>
 *
 * @method RepairService|null find($id, $lockMode = null, $lockVersion = null)
 * @method RepairService|null findOneBy(array $criteria, array $orderBy = null)
 * @method RepairService[]    findAll()
 * @method RepairService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepairServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RepairService::class);
    }

//    /**
//     * @return RepairService[] Returns an array of RepairService objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RepairService
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
