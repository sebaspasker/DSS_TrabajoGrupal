<?php

namespace Tests\Unit;

/* use PHPUnit\Framework\TestCase; */
use Tests\TestCase; 
use App\User;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
	/** @test */
	public function correct_user_save()
	{
		$user_exist = User::where('name', 'JuanPrueba')->first();
		if($user_exist != null) { 
		 	$user_exist->delete(); 
		} 

		$user = new User();
		$user->name = 'JuanPrueba';
		$user->email = 'emailJuan@gmail.com';
		$user->password = 'hola123';
		$user->save();

		$user_find = User::where('name', 'JuanPrueba')->first();

		$this->assertEquals($user_find->name, 'JuanPrueba');
		$this->assertEquals($user_find->email, 'emailJuan@gmail.com'); 
		$this->assertEquals($user_find->password, 'hola123');
		$user->delete();
	}
	
	/**
	 * @test
	 */
	public function insert_user_controller() {
		
	}
}
