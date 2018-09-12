<?php

namespace App\Repository;

use App\Entity\Kontrol;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Kontrol|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kontrol|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kontrol[]    findAll()
 * @method Kontrol[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KontrolRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Kontrol::class);
    }

//    /**
//     * @return Kontrol[] Returns an array of Kontrol objects
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
    public function findOneBySomeField($value): ?Kontrol
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
