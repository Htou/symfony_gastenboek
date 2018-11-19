<?php

namespace App\Repository;

use App\Entity\Gastenboek;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Gastenboek|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gastenboek|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gastenboek[]    findAll()
 * @method Gastenboek[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GastenboekRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Gastenboek::class);
    }

    // /**
    //  * @return Gastenboek[] Returns an array of Gastenboek objects
    //  */
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
    public function findOneBySomeField($value): ?Gastenboek
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
