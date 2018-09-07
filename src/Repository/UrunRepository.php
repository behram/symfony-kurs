<?php

namespace App\Repository;

use App\Entity\Urun;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Urun|null find($id, $lockMode = null, $lockVersion = null)
 * @method Urun|null findOneBy(array $criteria, array $orderBy = null)
 * @method Urun[]    findAll()
 * @method Urun[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UrunRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Urun::class);
    }

//    /**
//     * @return Urun[] Returns an array of Urun objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Urun
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
