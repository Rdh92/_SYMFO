<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Ici la méthode load() de la binliothèque orm-fixtures, va nous permettre d'insérer des données fictives relatives à notre entité 'Articles', en BDD.
        //Pour cela nous avons besoin d'instancié un objet de notre entité 'Articles'.



        //$manager->persist($product);

        $manager->flush();
    }
}
?>