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
					'name' => "company$i",
				));
			}
    }
}
