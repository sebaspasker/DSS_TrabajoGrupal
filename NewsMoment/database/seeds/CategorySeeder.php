<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
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
				\DB::table('categories')->insert(array(
					'name' => "Category$i",
					'slugname' => $faker->firstNameFemale,
					'imagen' => "Image$i"
				));
				}
    }
}
