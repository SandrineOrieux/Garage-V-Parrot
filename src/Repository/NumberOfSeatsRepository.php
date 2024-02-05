<?php

namespace App\Repository;

use App\Entity\NumberOfSeats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NumberOfSeats>
 *
 * @method NumberOfSeats|null find($id, $lockMode = null, $lockVersion = null)
 * @method NumberOfSeats|null findOneBy(array $criteria, array $orderBy = null)
 * @method NumberOfSeats[]    findAll()
 * @method NumberOfSeats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NumberOfSeatsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NumberOfSeats::class);
    }

//    /**
//     * @return NumberOfSeats[] Returns an array of NumberOfSeats objects
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

//    public function findOneBySomeField($value): ?NumberOfSeats
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
