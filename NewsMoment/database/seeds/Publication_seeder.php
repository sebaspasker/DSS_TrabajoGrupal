<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class Publication_seeder extends Seeder
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
		\DB::table('publications')->insert(array(
			'id' => $faker-> firstNameFemale,
			'slugname' => $faker-> firstNameFemale,
			'title' => $faker-> firstNameFemale,
			'subtitle' => $faker-> firstNameFemale,
			'source' => $faker-> firstNameFemale,
			'image_url' => $faker-> firstNameFemale,
			'video_url' => $faker-> firstNameFemale,
			'category' => $faker-> firstNameFemale,
			'active' => $faker-> $faker->randomElement(['1','0']),
			'has_video' => $faker-> randomElement(['1','0']),
			'views_counter' => $faker-> randomElement([]),
			'created' => $faker-> date('Y-m-d H:m:s'),
			'modified' => $faker-> date('Y-m-d H:m:s')
		));
	}
    }
}
