<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BannerSeeder extends Seeder
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
					'title' => $faker-> firstNameFemale,
					'url' => $faker-> firstNameFemale,
					'image_url' => $faker-> firstNameFemale,
					'ranking_type' => random_int(0, 100),
					'is_active' => false,
					'views_counter' => random_int(0, 100),
					'company_name' => "_company$i",
				));
					 //
				}
		}
}
