<?php
namespace App\Repository;

use App\Entity\Animal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class AnimalRepository extends ServiceEntityRepository{
    public function __construct(RegistryInterface $registry){
        parent::__construct($registry,Animal::class);
    }
    public function findByRaza($raza){
        $queryBuilder=$this->createQueryBuilder('a')
        ->andWhere('a.raza=:raza')
        ->setParameter('raza',$raza)
        ->orderBy('a.id','DESC')
        ->getQuery();
        //Ejecucion de la consulta
        $resultset=$queryBuilder->execute();

        return $resultset;
    }

    public function animalsByRaza($raza){
        $queryBuilder=$this->createQueryBuilder('a')
        ->andWhere('a.raza=:raza')
        ->setParameter('raza',$raza)
        ->orderBy('a.id','DESC')
        ->getQuery();
        //Ejecucion de la consulta
        $resultset=$queryBuilder->execute();

        return $resultset;
    }
}