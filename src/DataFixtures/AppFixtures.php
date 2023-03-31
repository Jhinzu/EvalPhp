<?php

namespace App\DataFixtures;

use App\Entity\Annonces;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //utilisations de fakerPHP
        $faker = Factory::create('fr_FR');

        // Créer un tableau de 10 annonces aléatoires
        $annoncesArray = [];

        for ($i = 0; $i < 10; $i++) 
        {
            $annonce = new Annonces();
            $annonce
                ->setType($faker->streetSuffix())
                ->setContainer($faker->text())
                ->setPrice($faker->randomFloat(2, 0, 100))
                ->setTitle($faker->company())
                ->setDepartment($faker->city())
                ->setDateAdd($faker->dateTimeThisMonth())
                ->setDateMaxPublication($faker->dateTimeThisMonth());
            $annoncesArray[] = $annonce;
        }

        // Persister toutes les annonces dans la base de données
        foreach ($annoncesArray as $annonce) 
        {
            $manager->persist($annonce);
        }

        $manager->flush();
    }
}
