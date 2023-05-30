<?php

namespace App\Repository;

use App\Entity\User;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function add(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newHashedPassword);

        $this->add($user, true);
    }

    public function getSuggests(Collection $skills, DateTime $date, String $type)
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->join('u.stages', 's')
            ->join('s.skills', 'sk')
            ->where('sk.id IN (:id)')
            ->andWhere('u.type = :type')
            ->andWhere('s.startDate >= :date')
            ->setParameter('id', $skills)
            ->setParameter('type', $type)
            ->setParameter('date', $date);;

        return $qb->getQuery()->getResult();
    }

    // get users where match
    public function findMatchesMutual(User $user): array
    {
        // $qb = $this->createQueryBuilder('u')
        //     ->select('u')
        //     ->leftJoin('App\Entity\MyMatch', 'm', 'WITH', 'm.sender = u OR m.receiver = u')
        //     ->where('m.isMutual = true')
        //     ->andWhere('u != :user')
        //     ->setParameter('user', $user);
        // return $qb->getQuery()->getResult();

        //replace with a basic SQL query
        $sql = "SELECT 
        CASE WHEN m.sender_id = u.id THEN m.receiver_id ELSE m.sender_id END AS id FROM user u
        LEFT JOIN my_match m ON m.sender_id = u.id OR m.receiver_id = u.id 
        WHERE m.is_mutual = 1 AND u.id = :user";

        $doctrine = $this->getEntityManager()->getConnection();
        $statement = $doctrine->prepare($sql);
        $statement->bindValue('user', $user->getId());
        $result = $statement->executeQuery();
        $users = array();
        while ($row = $result->fetchAssociative()) {
            $users[] = $this->find($row['id']);
        }

        return $users;
    }

    public function findMatchesFromMe(User $user): array
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u as user', 'm.id as matchId')
            ->leftJoin('App\Entity\MyMatch', 'm', 'WITH', 'm.receiver = u')
            ->where('m.isMutual = false')
            ->andWhere('m.sender = :user')
            ->setParameter('user', $user);

        return $qb->getQuery()->getResult();
    }

    // get users who liked me
    public function findMatchesToMe(User $user): array
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u as user', 'm.id as matchId')
            ->leftJoin('App\Entity\MyMatch', 'm', 'WITH', 'm.sender = u')
            ->where('m.isMutual = false')
            ->andWhere('m.receiver = :user')
            ->setParameter('user', $user);

        return $qb->getQuery()->getResult();
    }


    //    /**
    //     * @return User[] Returns an array of User objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('u.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?User
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
