<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Ici la méthode load() de la binliothèque orm-fixtures, va nous permettre d'insérer des données fictives relatives à notre entité 'Articles', en BDD.
        //Pour cela nous avons besoin d'instancié un objet de notre entité 'Articles'.

        //$product = new Product();
        for($i =1; $i <=10; $i++)
        {
            $article = new Article(); // On instancie l'entité Articles.php qui se trouve dans le dossier (namespace)

            $article->setTitle("Titre de l'article n°:" .$i)
                    ->setContent("<p>Contenu de l'article n°.$i </p>")
                    ->setImage("https://via.placeholder.com/350x150")
                    ->setAuthor("Redha")
                    ->setCreatedAt(new \DateTime());// La class DateTime de php est en dehors de ce namespace, on la précèdera d'un back-slash '\'
                    
            $manager->persist($article); // la méthode persist met en mémoire les données que l'on envoit dans les setters
        }




        $manager->flush(); // La méthode flush() insère réellement (via la requête SQL) les différentes manipulations que nous avons fait ici.
    }
}
?>