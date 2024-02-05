<?php

namespace App\Repository;

use App\Entity\TypeOfVehicles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeOfVehicles>
 *
 * @method TypeOfVehicles|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeOfVehicles|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeOfVehicles[]    findAll()
 * @method TypeOfVehicles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeOfVehiclesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeOfVehicles::class);
    }

//    /**
//     * @return TypeOfVehicles[] Returns an array of TypeOfVehicles objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TypeOfVehicles
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
