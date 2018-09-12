<?php

namespace App\Repository;

use App\Entity\Gorev;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Gorev|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gorev|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gorev[]    findAll()
 * @method Gorev[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GorevRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Gorev::class);
    }

//    /**
//     * @return Gorev[] Returns an array of Gorev objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gorev
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
