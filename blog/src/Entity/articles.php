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
}