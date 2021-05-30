<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			$faker = faker::create();

				$email = "email@email.com";
				\DB::table('users')->insert(array(
				'name' => "juan",
				'email' => "juan_carlos@gmail.com",
				'password' => "password"));


				\DB::table('users')->insert(array(
				'name' => "Paco",
				'email' => "h@h.com",
				'password' => "pop123123",
				'is_admin' => true));
				

			for ($i=0; $i < 25; $i++)
			{
				$email = "email$i@email.com";
				\DB::table('users')->insert(array(
				'name' => $faker-> firstnamefemale,
				'email' => "email$i@email.com",
				'password' => $faker-> firstnamefemale,
				));
			}
    }
}
