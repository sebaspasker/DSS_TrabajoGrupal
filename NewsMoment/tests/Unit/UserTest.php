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
		$user = new User();
		$user->name = "";
		$user->email = "";
		$user->password = "";
		$user_controller = new UserController();
		$val = $user_controller->insert_user($user);
																				 
		$this->assertFalse($val);
	}

	/**
	 * @test
	 */
	public function delete_user_controller() {
		$user_exist = user::where('email', 'juan_alberto@gmail.com')->first();
		if($user_exist != null) { 
		 	$user_exist->delete(); 
		} 

		$user = new User();
		$user->name = "Juan Alberto3";
		$user->email = "juan_alberto@gmail.com";
		$user->password = "JuanJuanJuan";
		$user->save();
		$user_controller = new UserController();
		$val = $user_controller->delete_user(null, $user->email);
		$this->assertNull(User::where('name', 'Juan Alberto3')->first());
		$this->assertTrue($val);
		if($val == false) $user->delete();
	}

	/**
	 * @test
	 */
	public function delete_user_controller_user_input() {
		$user_exist = user::where('email', 'juan_alberto@gmail.com')->first();
		if($user_exist != null) { 
		 	$user_exist->delete(); 
		} 

		$user = new User();
		$user->name = "Juan Alberto3";
		$user->email = "juan_alberto@gmail.com";
		$user->password = "JuanJuanJuan";
		$user->save();
		$user_controller = new UserController();
		$val = $user_controller->delete_user($user);
		$this->assertNull(User::where('name', 'Juan Alberto3')->first());
		$this->assertTrue($val);
		if($val == false) $user->delete();
	}

	/**
	 * @test
	 */
	public function delete_user_empty_values() {
		$user = new User();
		$user->name = "";
		$user->email = "";
		$user->password = "";
		$user_controller = new UserController();
		$val = $user_controller->delete_user($user);
		$this->assertFalse($val);
	}

	/**
	 * @test
	 */
	public function modify_user_controller() {
		$user_exist = user::where('email', 'juan_alberto@gmail.com')->first();
		if($user_exist != null) { 
		 	$user_exist->delete(); 
		} 

		$user = new User();
		$user->name = "Juan Alberto4";
		$user->email = "juan_alberto@gmail.com";
		$user->password = "JuanJuanJuan";
		$user->save();
		$user_controller = new UserController();
		$user->name = "Juan Alberto5";
		$user->password = "123pollito";
		$val = $user_controller->modify_user(null, $user->name, $user->email, $user->password);
		$this->assertTrue($val);
		$user_modified = User::where('email', 'juan_alberto@gmail.com')->first();
		$this->assertEquals($user_modified->name, $user->name);
		$this->assertEquals($user_modified->email, $user->email);
		$this->assertEquals($user_modified->password, $user->password);
		$user_modified->delete();
	}

	/**
	 * @test
	 */
	public function modify_user_controller_user_input() {
		$user_exist = user::where('email', 'juan_alberto@gmail.com')->first();
		if($user_exist != null) { 
		 	$user_exist->delete(); 
		} 

		$user = new User();
		$user->name = "Juan Alberto4";
		$user->email = "juan_alberto@gmail.com";
		$user->password = "JuanJuanJuan";
		$user->save();
			
		$user->name = "Juan Alberto5";
		$user->password = "123pollito";
		$user_controller = new UserController();
		$val = $user_controller->modify_user($user);
		$this->assertTrue($val);
		$user_modified = User::where('email', 'juan_alberto@gmail.com')->first();
		$this->assertEquals($user_modified->name, $user->name);
		$this->assertEquals($user_modified->email, $user->email);
		$this->assertEquals($user_modified->password, $user->password);
		$user_modified->delete();
	}

	public function modify_user_empty_values() {
		$user = new User();
		$user->name = "";
		$user->email = "";
		$user->password = "";
			

		$user_controller = new UserController();
		$val = $user_controller->modify_user($user);
		$this->assertFalse($val);
	}
}
