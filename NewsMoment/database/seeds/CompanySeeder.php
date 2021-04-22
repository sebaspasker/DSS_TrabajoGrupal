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
			for ($i=0; $i < 25; $i++)
			{
				\DB::table('companies')->insert(array(
					'name' => "_company$i",
					'image_url' => "_image$i",
					'is_active' => false,
				));
			}
    }
}
