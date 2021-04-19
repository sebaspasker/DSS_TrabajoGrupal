<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

// TODO

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
			DB::table('users')->insert(array(
				'name' => 'JuanPrueba',
				'email' => 'emailJuan@email.com',
				'password' => '1234Prueba',
			));

			$user = DB::table('users')->where('name', 'JuanPrueba')->find();
			
    }
}
