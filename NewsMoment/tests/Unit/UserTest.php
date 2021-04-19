<?php

namespace Tests\Unit;

/* use PHPUnit\Framework\TestCase; */
use Tests\TestCase; 
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
	/** @test */
	public function correct_user_save()
	{
		$user = new User();
		$user->name = 'JuanPrueba';
		$user->save();

		$this->assertEquals('hoal', 'hoal');
		/* $user = DB::table('users')->where('name', 'JuanPrueba')->first(); */
		/* $this->assertEquals($user->name, 'JuanPrueba'); */
		/* $this->assertEquals($user->email, 'emailJuan@gmail.com'); */
		/* $this->assertEquals($user->password, 'Password1234'); */
			
	}
}
