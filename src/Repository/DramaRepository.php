<?php

namespace App\Repository;

use App\Entity\Drama;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Drama|null find($id, $lockMode = null, $lockVersion = null)
 * @method Drama|null findOneBy(array $criteria, array $orderBy = null)
 * @method Drama[]    findAll()
 * @method Drama[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DramaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Drama::class);
    }

    // /**
    //  * @return Drama[] Returns an array of Drama objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Drama
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
