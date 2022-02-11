<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticlesRepository::class)]


class Articles
{
    /**
     *@ORM\Id
     *@ORM\GeneratedValue
     *@ORM\Column(type='integer')
     */
     private $id;

     /**
      * @ORM\Column(type="string" , length=255)
      */
      private $title;

      /**
       * @ORM\Column(type="text")
       */
      private $content;

      /**
       * @ORM\Column(type="string", length=255)
       */
      private $image;

      /**
       * @ORM\Column(type="string" , length=255)
       */
      private $author;
}
?>