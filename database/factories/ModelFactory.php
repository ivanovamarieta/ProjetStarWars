

<?php
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/*$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'pasword' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});*/


//$factory pour inserer les donnees dans la table products

//$factory->define(App\Customer::class, function (Faker\Generator $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->email,
//        'adress' => $faker->address,
//        'number_card'=>randCard(),
//        'number_command'=>rand(1,200)
//    ];
//});

function randCard(){
    $rand='';
    $r=0;
    while($r<16){
        $rand.=rand(1,9);
        $r++;
    }
    return $rand;
}


$factory->define(App\Product::class, function (Faker\Generator $faker) {
    $title=$faker->name; // pour ajouter les slugs
    return [
        'name' => $title,
        'slug'=>str_slug($title,"-"),
        'category_id' => rand(1,2),
        'price'=> $faker->randomFloat(10,2000),
        'quantity'=>rand(2,5),
        'abstract'=>$faker->paragraph(3),
        'published_at'=>$faker->dateTime('now'),
    ];

});


$factory->define(App\Customer::class, function(Faker\Generator $faker){
    static $userId=0;

    return[ 'user_id' =>++$userId,
            'address'=>$faker->address,
            'number_card'=>$faker->creditCardNumber,
            'number_command'=>rand(1,200),
          ];
});