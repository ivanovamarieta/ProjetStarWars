<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  //  public function __construct(Faker\Generator $faker){
  //      $this->faker=$faker;
 //   }

    public function run()
    {
        //DB::table('tags')->delete();

        DB::table('tags')->insert([
            ['name'=>'star'],
            ['name'=>'galaxy'],
            ['name'=>'laser'],
            ['name'=>'casque'],
            ['name'=>'princesse'],
            ['name'=>'saga'],
            ['name'=>'star wars 7'],
        ]);

        }
}
