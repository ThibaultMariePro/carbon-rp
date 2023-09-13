<?php

namespace App\Repository;

use App\Entity\CharacterSheetLine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CharacterSheetLine>
 *
 * @method CharacterSheetLine|null find($id, $lockMode = null, $lockVersion = null)
 * @method CharacterSheetLine|null findOneBy(array $criteria, array $orderBy = null)
 * @method CharacterSheetLine[]    findAll()
 * @method CharacterSheetLine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CharacterSheetLineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CharacterSheetLine::class);
    }

//    /**
//     * @return CharacterSheetLine[] Returns an array of CharacterSheetLine objects
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

//    public function findOneBySomeField($value): ?CharacterSheetLine
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
