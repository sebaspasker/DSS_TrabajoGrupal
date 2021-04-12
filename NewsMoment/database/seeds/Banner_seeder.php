<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Banner_seeder extends Seeder
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
		\DB::table('banners')->insert(array(
			'id',
			'title' => $faker-> firstNameFemale,
			'url' => $faker-> firstNameFemale,
			'image_url' => $faker-> firstNameFemale,
			'ranking_type' => $faker-> randomElement([]),
			'is_active' => $faker-> $faker->random_int(0, 1),
			'views_counter' => $faker-> randomElement([]),
			'created' => $faker-> date('Y-m-d H:m:s'),
			'modified' => $faker-> date('Y-m-d H:m:s')
		));
	}
    }
}
