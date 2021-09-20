<?php

namespace App\Repository;

use App\Entity\MenuPhare;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MenuPhare|null find($id, $lockMode = null, $lockVersion = null)
 * @method MenuPhare|null findOneBy(array $criteria, array $orderBy = null)
 * @method MenuPhare[]    findAll()
 * @method MenuPhare[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenuPhareRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MenuPhare::class);
    }

    // /**
    //  * @return MenuPhare[] Returns an array of MenuPhare objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MenuPhare
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
