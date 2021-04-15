<?php

use Illuminate\Database\Seeder;
use faker\factory as faker;

class EditorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			$faker = faker::create();


			for ($i=0; $i < 25; $i++)
			{
				$email = "email$i@email.com";
				\DB::table('editors')->insert(array(
				'description' => $faker-> firstnamefemale,
				'email' => $email,
				'profile_image_url' => $faker-> firstnamefemale,
				'facebook' => $faker-> firstnamefemale,
				'instagram' => $faker-> firstnamefemale,
				'twitter' => $faker-> firstnamefemale,
				'created' => now(),
				'modified' => now(),
				'is_admin' => false,
				'is_active' => false,
				));
			}
    }
}
