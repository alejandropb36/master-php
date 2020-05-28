<?php

namespace App\Repository;

use App\Entity\Animal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AnimalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::parent($registry, Animal::class);
    }

    public function findByColor($order)
    {
        $queryBuilder = $this->createQueryBuilder('a')
        // ->andWhere("a.raza = :raza")
        // ->setParameter('raza', 'Canino')
        ->orderBy('a.color', $order)
        ->getQuery();
        $resultSet = $queryBuilder->execute();
        return $resultSet;
    }
}