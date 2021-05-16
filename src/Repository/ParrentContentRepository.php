<?php

namespace App\Repository;

use App\Entity\ParrentContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ParrentContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParrentContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParrentContent[]    findAll()
 * @method ParrentContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParrentContentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParrentContent::class);
    }

    // /**
    //  * @return ParrentContent[] Returns an array of ParrentContent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ParrentContent
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
