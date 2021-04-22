<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			  $this->call(UserSeeder::class);
				$this->call(EditorSeeder::class);
				$this->call(CategorySeeder::class);
				$this->call(PublicationSeeder::class);
				$this->call(CompanySeeder::class);
				$this->call(BannerSeeder::class);
    }
}
