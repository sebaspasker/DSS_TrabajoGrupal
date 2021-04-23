<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			$companies = ['Árboles Ferrol', 'S.A. Artisan', 'S.L. Cars', 'Pipe the Line', 'S.S.S.A.A.A'];
			$images = ['image_company1','image_company2','image_company3','image_company4','image_company5'];
			for($i=0; $i< count($companies); $i++) {
			\DB::table('companies')->insert(array(
				'name' => "$companies[$i]",
				'image_url' => "$images[$i]",
				'is_active' => true,
			));
			
			}
		}
}
