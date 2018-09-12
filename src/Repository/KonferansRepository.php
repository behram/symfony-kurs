<?php

namespace App\Repository;

use App\Entity\Konferans;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Konferans|null find($id, $lockMode = null, $lockVersion = null)
 * @method Konferans|null findOneBy(array $criteria, array $orderBy = null)
 * @method Konferans[]    findAll()
 * @method Konferans[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KonferansRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Konferans::class);
    }

//    /**
//     * @return Konferans[] Returns an array of Konferans objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Konferans
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
