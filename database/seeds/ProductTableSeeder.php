<?php
use App\Tag;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $tag;                              //
    public function __construct(Tag $tag)        //introduire la variable  de class
{
    $this->tag=$tag;
}

    public function run()
    {
        $shuffle=function($tags,$num) // il faut passer des arguments ppour cette function anonyme, elle est mis dans une variable
        {
            $s=[];
            while($num>0)
            {
                $s[]=$tags[$num];
                $num--;
            }
            return $s;
        };

        // shuffle ($tags,2);

        $max=$this->tag->count();                   // $max=Tag::count();           - une autre manière
        $tags=$this->tag->lists('id')->toArray() ;  //  passer d'une collection à un array
   //   $tags=$this->tag->lists('id');              // $tags=Tag::lists('id');      renvoie un tableua numérique des id

        //  factory(App\Product::class,15)->create();

         factory(App\Product::class,15)->create()->each(function($product) use ($max,$tags,$shuffle) // pour utiliser dans la fonction les variables locales - use -
         { //  var_dump( $product->id);//ici on récupère chaque Entité hydraté avec un product crée dans la table de products, une ligne de table= un objet $product

             //$product->tags()->attach([1,2]);  // c'est comme Product::find(1)->tags()->attach([1,2]);
             $product->tags()->attach($shuffle($tags,rand(1,$max-1)));
        });
    }
}


//TagTableSeeder =>creer des tags
//Product Table Seeder =>associer des tags a l'aide de faker
