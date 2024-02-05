<?php

namespace App\Repository;

use App\Entity\ImagesVehicle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ImagesVehicle>
 *
 * @method ImagesVehicle|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImagesVehicle|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImagesVehicle[]    findAll()
 * @method ImagesVehicle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImagesVehicleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImagesVehicle::class);
    }

//    /**
//     * @return ImagesVehicle[] Returns an array of ImagesVehicle objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ImagesVehicle
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
