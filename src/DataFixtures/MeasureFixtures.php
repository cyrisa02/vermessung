<?php

namespace App\DataFixtures;
use App\Entity\Measure;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MeasureFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $measure = new Measure();
        $measure->setTitle('Esszimmer');
        $measure->setDescription('Bemerkung, ToDo List');
        $measure->setPlace('Berlin');
        $measure->setWidth('500');
        $measure->setLength('645');
        $manager->persist($measure);  

        $measure = new Measure();
        $measure->setTitle('Schlafzimmer');
        $measure->setDescription('Bemerkung, ToDo List');
        $measure->setPlace('Potsdam');
        $measure->setWidth('450');
        $measure->setLength('585');
        $manager->persist($measure);  


        $measure = new Measure();
        $measure->setTitle('Wohnzimmer');
        $measure->setDescription('Bemerkung, ToDo List');
        $measure->setPlace('Falkensee');
        $measure->setWidth('580');
        $measure->setLength('645');
        $manager->persist($measure);  


        $measure = new Measure();
        $measure->setTitle('Esszimmer');
        $measure->setDescription('Bemerkung, ToDo List');
        $measure->setPlace('Ludwigsfelde');
        $measure->setWidth('680');
        $measure->setLength('695');
        $manager->persist($measure);  


        $manager->flush();
    }
}