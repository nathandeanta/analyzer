<?php

namespace App\Repository;

use App\Entity\Debts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Debts>
 *
 * @method Debts|null find($id, $lockMode = null, $lockVersion = null)
 * @method Debts|null findOneBy(array $criteria, array $orderBy = null)
 * @method Debts[]    findAll()
 * @method Debts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DebtsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Debts::class);
    }

//    /**
//     * @return Debts[] Returns an array of Debts objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Debts
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
