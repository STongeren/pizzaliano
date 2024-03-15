<?php

namespace App\Repository;

use App\Entity\Fesfsefs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Fesfsefs>
 *
 * @method Fesfsefs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fesfsefs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fesfsefs[]    findAll()
 * @method Fesfsefs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FesfsefsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fesfsefs::class);
    }

//    /**
//     * @return Fesfsefs[] Returns an array of Fesfsefs objects
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

//    public function findOneBySomeField($value): ?Fesfsefs
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
