<?php

namespace App\Repository;

use App\Entity\QuestionsAndAnswers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method QuestionsAndAnswers|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuestionsAndAnswers|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuestionsAndAnswers[]    findAll()
 * @method QuestionsAndAnswers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestionsAndAnswersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, QuestionsAndAnswers::class);
    }

    // /**
    //  * @return QuestionsAndAnswers[] Returns an array of QuestionsAndAnswers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?QuestionsAndAnswers
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
