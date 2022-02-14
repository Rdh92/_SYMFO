<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Articles;
use App\Form\ArticlesFormType;
use App\Repository\ArticleRepository;
use App\Repository\ArticlesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(ArticleRepository $repo): Response
    {   
        
         /*
                        Pour sélectionner nos articles contenu dans la table articles en BDD, nous devons absolument avoir accès à la classe Repository de la classe corespondante, en l'occurence 'Articles' (ArticleRepository).

                        Un Repository est une classe permettant de faire uniquement des requêtes selections en base de données (ex: SELECT * FROM articles).

                        Pour cela nous avons intancié un objet $repo dans les paramètres de la méthode.

                        Cet objet va contenir des méthodes permettant d'exécuter des requêtes (exemple: $repo->findAll())
                     */
                    //get_class_methods($repo) est une fonction prédéfinie de php nous permettant de voir toutes les méthodes (fonctionnalités) d'une classe
                    // dd(get_class_methods($repo));  //  dump() est fonction de débugage de symfony (semblable à var_dump). et dd() une variante avec un die() => on dump la variable et on arrête le programme.

                    $articles = $repo->findBy(array(), array('createdAt' => 'asc'));// équivalant SQL/php => (SELECT * FROM articles ORDER BY createdAt ASC) + fetchAll()

                    // dd($articles); //On récupère tous nos articles stockés en BDD



        return $this->render('blog/index.html.twig', [
            'articles'    => $articles // On transmet le contenu de notre variable $articles sur le template blog/index.html.twig
        ]);
    }



        /**
         * @Route("/", name="home")
         */
        public function home(): Response
        {
            return $this->render('blog/home.html.twig', [
                'titre1' => 'Bienvenue sur mon SuperBlog',
                'age'   => 22
            ]);
        }

        /**
         * @Route("/show/{id}", name="show")
         */
        public function show(Article $article): Response
        {       
                //  dd($article);
                return $this->render('blog/show.html.twig', [
                   'article' =>  $article
   
                ]);
        }

        /**
         *  @Route("/new", name="new")
         */
        public function create(Article $articleNew = null): Response
        {
            dd($articleNew);

            // Nous avons créer une classe 'ArticlesFormType' qui permet de générer un formulaire d'ajout d'article.
            $form = $this->createForm(ArticlesFormType::class, $articleNew); //createForm() prend en paramètre le type de formulaire et la classe sur laquelle on injectera les valeurs entrées dans les inputs (name="title", name="content", etc)

            dd($form);

            return $this->render('blog/new.html.twig', [
                // 'articleNew' => $articleNew
            ]);
        }
}
