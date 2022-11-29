<?php

namespace App\DataFixtures;
use App\Entity\Client;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ClientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $client = new Client();
        $client->setLastname('Busch');
        $client->setFirstname('Dominik');
        $client->setDescription('ToDo List');
        $client->setEmail('dominik@gmail.com');
        $client->setAddress('BeispielStrasse 12');
        $client->setZipcode('10115');
        $client->setCity('Berlin');
        $client->setIsValid('1');
        $client->setPhone('0615603504');
        $manager->persist($client); 

        $client = new Client();
        $client->setLastname('Jung');
        $client->setFirstname('Ulrich');
        $client->setDescription('ToDo List');
        $client->setEmail('ulrcih@gmail.com');
        $client->setAddress('GoetheStrasse 12');
        $client->setZipcode('10115');
        $client->setCity('Berlin');
        $client->setIsValid('0');
        $client->setPhone('0615603504');
        $manager->persist($client); 

        $client = new Client();
        $client->setLastname('Hartmann');
        $client->setFirstname('Rainer');
        $client->setDescription('ToDo List');
        $client->setEmail('rainer@gmail.com');
        $client->setAddress('DaimlerStrasse 12');
        $client->setZipcode('10115');
        $client->setCity('Berlin');
        $client->setIsValid('1');
        $client->setPhone('0615603504');
        $manager->persist($client); 

        $client = new Client();
        $client->setLastname('Schumacher');
        $client->setFirstname('Rodolph');
        $client->setDescription('ToDo List');
        $client->setEmail('rodolph@gmail.com');
        $client->setAddress('BrückenStrasse 12');
        $client->setZipcode('10115');
        $client->setCity('Berlin');
        $client->setIsValid('1');
        $client->setPhone('0615603504');
        $manager->persist($client); 
        
        


        $manager->flush();
    }
}