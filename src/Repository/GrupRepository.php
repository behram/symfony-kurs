<?php

namespace App\Repository;

use App\Entity\Grup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Grup|null find($id, $lockMode = null, $lockVersion = null)
 * @method Grup|null findOneBy(array $criteria, array $orderBy = null)
 * @method Grup[]    findAll()
 * @method Grup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GrupRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Grup::class);
    }

//    /**
//     * @return Grup[] Returns an array of Grup objects
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
    public function findOneBySomeField($value): ?Grup
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
