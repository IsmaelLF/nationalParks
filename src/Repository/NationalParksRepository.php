<?php

namespace App\Repository;

use App\Entity\NationalParks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NationalParks>
 *
 * @method NationalParks|null find($id, $lockMode = null, $lockVersion = null)
 * @method NationalParks|null findOneBy(array $criteria, array $orderBy = null)
 * @method NationalParks[]    findAll()
 * @method NationalParks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NationalParksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NationalParks::class);
    }

//    /**
//     * @return NationalParks[] Returns an array of NationalParks objects
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

//    public function findOneBySomeField($value): ?NationalParks
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
