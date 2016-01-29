<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert(
          [
            [
               'name'=>'Tony',
               'email'=>'tony@tony.fr',
               'password'=>Hash::make('Tony'),
                'role'=>'administrator'

             ],
              [
                  'name'=>'Mari',
                  'email'=>'mari@mari.fr',
                  'password'=>Hash::make('Mari'),
                  'role'=>'visitor'

              ],
              [
                  'name'=>'Toto',
                  'email'=>'toto@toto.fr',
                  'password'=>Hash::make('Toto'),
                  'role'=>'visitor'

              ],
              [
                  'name'=>'Pepe',
                  'email'=>'pepe@ppepe.fr',
                  'password'=>Hash::make('Pepe'),
                  'role'=>'visitor'

              ],
          ]
      );

    }
}
