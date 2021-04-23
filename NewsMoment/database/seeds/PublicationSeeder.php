<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.  *
     * @return void
     */
    public function run()
    {
			 $faker = Faker::create();
			
			 /*
			for ($i=0; $i < 25; $i++)
			{
				$slugname = $faker->firstNameFemale;
				$slugname = $slugname."$i";
				$email = "email$i@email.com";
				\DB::table('publications')->insert(array(
					'slugname' => $slugname,
					'title' => $faker-> firstNameFemale,
					'subtitle' => $faker-> firstNameFemale,
					'source' => $faker-> firstNameFemale,
					'image_url' => $faker-> firstNameFemale,
					'video_url' => $faker-> firstNameFemale,
					'category' => "Category$i",
					'active' => false,
					'has_video' => false,
					'views_counter' => random_int(0, 100),
					'editor_email' => $email,
				));
			}
				*/

				for($i=0; $i < 3; $i++) {
				\DB::table('publications')->insert(array(
					'slugname' => "slugname_publication_ $i",
					'title' => "Titulo $i",
					'subtitle' => "Subtitulo $i",
					'source' => "Source $i",
					'image_url' => "static/img/noticia_normal.jpg",
					'video_url' => $faker-> firstNameFemale,
					'category' => "Category$i",
					'active' => false,
					'has_video' => false,
					'views_counter' => random_int(0, 100),
					'editor_email' => "email$i@email.com",
					'created_at' => now(),
					'updated_at' => now(),
				));
				 
				
				
			}
		}	
}
