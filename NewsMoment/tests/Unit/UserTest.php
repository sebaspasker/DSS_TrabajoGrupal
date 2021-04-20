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
		$user_exist = User::where('name', 'Juan Alberto')->first();
		if($user_exist != null) { 
		 	$user_exist->delete(); 
		} 

		$user = new User();
		$user->name = "Juan Alberto";
		$user->email = "juan@gmail.com";
		$user->password = "juan123";
		$user_controller = new UserController();
		$val = $user_controller->insert_user(null, $user->name, 
																				 $user->email, $user->password);
		$this->assertTrue($val);
		$this->assertDatabaseHas('users', [
			'email' => $user->email,
			'name' => $user->name,
			'password' => $user->password,
		]);

		$user->delete();
	}

	/**
	 * @test
	 */
	public function insert_user_controller_user_input() {
		$user_exist = User::where('name', 'Juan Alberto2')->first();
		if($user_exist != null) { 
		 	$user_exist->delete(); 
		} 

		$user = new User();
		$user->name = "Juan Alberto2";
		$user->email = "juan2@gmail.com";
		$user->password = "juan1233";
		$user_controller = new UserController();
		$val = $user_controller->insert_user($user);
																				 
		$this->assertTrue($val);
		$this->assertDatabaseHas('users', [
			'email' => $user->email,
			'name' => $user->name,
			'password' => $user->password,
		]);

		$user->delete();
	}

	/**
	 * @test
	 */
	public function insert_user_empty_values() {
		// TODO
	}

	/**
	 * @test
	 */
	public function delete_user_controller() {
		// TODO
	}

	/**
	 * @test
	 */
	public function delete_user_controller_user_input() {
		// TODO
	}

	/**
	 * @test
	 */
	public function delete_user_empty_values() {
		// TODO
	}

	/**
	 * @test
	 */
	public function modify_user_controller() {
		// TODO
	}

	/**
	 * @test
	 */
	public function modify_user_controller_user_input() {
		// TODO
	}

	public function modify_user_empty_values() {
		// TODO
	}
}
