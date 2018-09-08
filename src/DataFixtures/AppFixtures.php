<?php

namespace App\DataFixtures;

use App\Entity\Urun;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        foreach (range(0,10) as $v){
            $urun = new Urun();
            $urun
                ->setIsim($faker->text(20))
                ->setAciklama($faker->text(300))
                ->setFiyat(rand(0,1000))
                ->setPerformans(rand(0,10))
                ->setTag($faker->text(10))
                ;
            $manager->persist($urun);
        }
        $manager->flush();
    }
}