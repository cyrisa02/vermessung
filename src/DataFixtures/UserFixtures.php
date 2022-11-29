<?php

namespace App\DataFixtures;
use Faker;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder,
        
    ){}

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setEmail('cyrisa02.test@gmail.com');
        $admin->setRoles(['ROLE_ADMIN']);        
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, 'admin')
        );
        $admin->setLastname('Gourdon');
        $admin->setFirstname('Cyril');
        $admin->setCompany('Admin');        
        $admin->setIsVerified(true); 
        $manager->persist($admin);  

        $faker = Faker\Factory::create('fr_FR');
        for($usr = 1; $usr <= 5; $usr++){
            $user = new User();
            $user->setEmail($faker->email);
            $user->setRoles(['ROLE_MEMBER']);
            $user->setPassword(
            $this->passwordEncoder->hashPassword($user, 'azerty')
        );
            $user->setLastname($faker->lastName);
            $user->setFirstname($faker->firstName);
            $user->setCompany($faker->lastName);            
            $user->setIsVerified(mt_rand(0,1) == 1 ? true :false);

            $manager->persist($user);  
    }
            $manager->flush();
    }
}