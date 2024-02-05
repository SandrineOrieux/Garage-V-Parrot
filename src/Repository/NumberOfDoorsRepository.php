<?php

namespace App\Repository;

use App\Entity\NumberOfDoors;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NumberOfDoors>
 *
 * @method NumberOfDoors|null find($id, $lockMode = null, $lockVersion = null)
 * @method NumberOfDoors|null findOneBy(array $criteria, array $orderBy = null)
 * @method NumberOfDoors[]    findAll()
 * @method NumberOfDoors[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NumberOfDoorsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NumberOfDoors::class);
    }

//    /**
//     * @return NumberOfDoors[] Returns an array of NumberOfDoors objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NumberOfDoors
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
