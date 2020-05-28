<?php

namespace App\Repository;

use App\Entity\Animal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AnimalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Animal::class);
    }

    public function getAnimalsOrderColor($order)
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