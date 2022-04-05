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
    /**
     * @return Drama[] Returns an array of Dramas objects
     */
    public function findDramaGenre($value): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.drGenre = :val')
            ->setParameter('val',$value)
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @return Drama[] Returns an array of Dramas objects
     */
    public function findDramaByLetter($value): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.drName like :val')
            ->setParameter('val', $value.'%')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @return string[] Returns an array of string
     */
    public function existDramaByLetter(): array
    {
        $alph =['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
        return $this->createQueryBuilder('d')
            ->andWhere('d.drName like :val')
            ->getQuery()
            ->getResult()
            ;
    }
}
