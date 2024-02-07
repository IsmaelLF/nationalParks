<?php

namespace App\Repository;

use App\Entity\Parks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Parks>
 *
 * @method Parks|null find($id, $lockMode = null, $lockVersion = null)
 * @method Parks|null findOneBy(array $criteria, array $orderBy = null)
 * @method Parks[]    findAll()
 * @method Parks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Parks::class);
    }


//    public function findById($id)
//    {
//        return $this->createQueryBuilder('parkId')
//            ->andWhere('parkId = :id')
//            ->setParameter('id', $id)
//            ->getQuery()
//            ->getOneOrNulLResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Parks
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
