<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Http\Controllers\UtilController;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		 $categories = ['CATALÁN', 'VALENCIA', 'CULTURA', 'PODER', 'POLÍTICA', 'LUJO', 'ESPAÑA', 'ECONOMÍA'];
		 $images = ['catalan', 'valencia', 'cultura', 'poder', 'política', 'lujo', 'espana', 'economia'];

			for ($i=0; $i < count($categories); $i++)
			{
				\DB::table('categories')->insert(array(
					'name' => "$categories[$i]",
					'slugname' => UtilController::slugify($categories[$i]),
					'imagen' => "/static/img/categories/$images[$i].jpg",
				));
			}
    }
}
