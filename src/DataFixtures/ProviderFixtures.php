<?php

namespace App\DataFixtures;
use App\Entity\Provider;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProviderFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $provider = new Provider();
        $provider->setCompany('Laminat-Pro');
        $provider->setLastname('Kieffer');
        $provider->setFirstname('Karl');
        $provider->setDescription('ToDo List');
        $provider->setEmail('karl@gmail.com');
        $provider->setAddress('BeispielStrasse 18');
        $provider->setZipcode('10115');
        $provider->setCity('Berlin');
        $provider->setPhone('0615603504');
        $manager->persist($provider); 

         $provider = new Provider();
        $provider->setCompany('Laminat-Lieferant');
        $provider->setLastname('Müller');
        $provider->setFirstname('Johan');
        $provider->setDescription('ToDo List');
        $provider->setEmail('johan@gmail.com');
        $provider->setAddress('SchumacherStrasse 12');
        $provider->setZipcode('10115');
        $provider->setCity('Berlin');
        $provider->setPhone('0615603504');
        $manager->persist($provider); 

        $manager->flush();
    }
}