<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Editor_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
	
	for ($i=0; $i < 25; $i++)
	{
		\DB::table('editors')->insert(array(
			'id' => $faker-> firstNameFemale,
			'description' => $faker-> firstNameFemale,
			'profile_image_url' => $faker-> firstNameFemale,
			'facebook' => $faker-> firstNameFemale,
			'instagram' => $faker-> firstNameFemale,
			'twitter' => $faker-> firstNameFemale,
			'created' => $faker-> date('Y-m-d H:m:s'),
			'modified' => $faker-> date('Y-m-d H:m:s'),
			'is_admin' => $faker-> $faker->randomElement(['1','0']),
			'is_active' => $faker-> randomElement(['1','0'])
		));
	}
    }
}
