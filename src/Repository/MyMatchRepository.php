<?php

namespace App\Repository;

use App\Entity\MyMatch;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MyMatch>
 *
 * @method MyMatch|null find($id, $lockMode = null, $lockVersion = null)
 * @method MyMatch|null findOneBy(array $criteria, array $orderBy = null)
 * @method MyMatch[]    findAll()
 * @method MyMatch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MyMatchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MyMatch::class);
    }

    public function add(MyMatch $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MyMatch $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    // get users that I liked
    public function findMatchesFromMe(User $user): array
    {
        $qb = $this->createQueryBuilder('m')
            ->select('u as user', 'm.id as matchId')
            ->from('App\Entity\User', 'u')
            ->join('m.receiver', 'r')
            ->where('m.sender = :sender')
            ->andWhere('r = u')
            ->andWhere('m.isMutual = :isMutual')
            ->setParameter('sender', $user)
            ->setParameter('isMutual', false);

        return $qb->getQuery()->getResult();
    }

    // get users who liked me
    public function findMatchesToMe(User $user): array
    {
        $qb = $this->createQueryBuilder('m')
            ->select('u as user', 'm.id as matchId')
            ->from('App\Entity\User', 'u')
            ->join('m.sender', 's')
            ->where('m.receiver = :receiver')
            ->andWhere('s = u')
            ->andWhere('m.isMutual = :isMutual')
            ->setParameter('receiver', $user)
            ->setParameter('isMutual', false);

        return $qb->getQuery()->getResult();
    }



    //    /**
    //     * @return MyMatch[] Returns an array of MyMatch objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('m.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?MyMatch
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
