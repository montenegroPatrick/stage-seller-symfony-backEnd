<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasherInterface)
    {
        $this->passwordHasher = $userPasswordHasherInterface;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $hashedPwd = $this->passwordHasher->hashPassword($user, 'test');
        $user
            ->setEmail('admin@seller.com')
            ->setPassword($hashedPwd)
            ->setFirstName('admin')
            ->setLastName('admin')
            ->setAddress("Back O'ffice main street")
            ->setPostCode(95100)
            ->setCity('Argenteuil')
            ->setType("ADMIN")
            ->setShowTuto(0)
            ->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);

        $user = new User();
        $user
            ->setEmail('younes@seller.com')
            ->setPassword($hashedPwd)
            ->setFirstName('Younes')
            ->setLastName('Kechiche')
            ->setAddress("Front O'ffice main street")
            ->setPostCode(78180)
            ->setCity('Montigny-le-Bretonneux')
            ->setType("STUDENT")
            ->setRoles(['ROLE_USER']);
        $manager->persist($user);

        $user = new User();
        $hashedPwd = $this->passwordHasher->hashPassword($user, 'test');
        $user
            ->setEmail('carrouf@seller.com')
            ->setPassword($hashedPwd)
            ->setCompanyName('carrouf')
            ->setSiret('45715669841245')
            ->setAddress("Back O'ffice main street")
            ->setPostCode(75001)
            ->setCity('PARIS')
            ->setType("COMPANY")
            ->setShowTuto(0)
            ->setRoles(['ROLE_USER']);
        $manager->persist($user);

        $user = new User();
        $user
            ->setEmail('toto@seller.com')
            ->setPassword($hashedPwd)
            ->setFirstName('Toto')
            ->setLastName('TATA')
            ->setAddress("Front O'ffice main street")
            ->setPostCode(78180)
            ->setCity('Montigny-le-Bretonneux')
            ->setType("COMPANY")
            ->setRoles(['ROLE_USER']);
        $manager->persist($user);

                $user = new User();
        $user
            ->setEmail('karim@seller.com')
            ->setPassword($hashedPwd)
            ->setFirstName('benchouchou')
            ->setLastName('karim')
            ->setAddress("Front O'ffice main street")
            ->setPostCode(78180)
            ->setCity('Montigny-le-Bretonneux')
            ->setType("STUDENT")
            ->setRoles(['ROLE_USER']);
        $manager->persist($user);

        $manager->flush();
    }
}
