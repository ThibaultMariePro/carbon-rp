<?php

namespace App\Repository;

use App\Entity\CharacterSheet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CharacterSheet>
 *
 * @method CharacterSheet|null find($id, $lockMode = null, $lockVersion = null)
 * @method CharacterSheet|null findOneBy(array $criteria, array $orderBy = null)
 * @method CharacterSheet[]    findAll()
 * @method CharacterSheet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CharacterSheetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CharacterSheet::class);
    }

//    /**
//     * @return CharacterSheet[] Returns an array of CharacterSheet objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CharacterSheet
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
