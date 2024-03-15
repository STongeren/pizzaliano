<?php

namespace App\Repository;

use App\Entity\Brood;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Brood>
 *
 * @method Brood|null find($id, $lockMode = null, $lockVersion = null)
 * @method Brood|null findOneBy(array $criteria, array $orderBy = null)
 * @method Brood[]    findAll()
 * @method Brood[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BroodRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Brood::class);
    }

//    /**
//     * @return Brood[] Returns an array of Brood objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Brood
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
