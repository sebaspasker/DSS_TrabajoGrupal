<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
	$this->call(Editor_seeder::Editor);
	$this->call(Publication_seeder::Publication);
	$this->call(Banner_seeder::Banner);
    }
}
