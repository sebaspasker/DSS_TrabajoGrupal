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
		$user_exist = User::where('email', 'juan_alberto@gmail.com')->first();
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
		$user_exist = User::where('email', 'juan_alberto@gmail.com')->first();
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
		$user_exist = User::where('email', 'juan_alberto@gmail.com')->first();
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
		$user_exist = User::where('email', 'juan_alberto@gmail.com')->first();
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

	private function delete_list_setup() {
		$user_exist = User::where('email', 'juan_de_la_vega@gmail.com')->first();
		if($user_exist != null) { 
		 	$user_exist->delete(); 
		} 

		$user_exist = User::where('email', 'juan_de_la_torre@gmail.com')->first();
		if($user_exist != null) { 
		 	$user_exist->delete(); 
		} 

		$user_exist = User::where('email', 'juanito@gmail.com')->first();
		if($user_exist != null) { 
		 	$user_exist->delete(); 
		} 
	}

	private function list_setup() {
		$this->delete_list_setup();
		// Create 3 new users
		$user1 = new User();
		$user1->name = "Juan De la Vega";
		$user1->email = "juan_de_la_vega@gmail.com";
		$user1->password = "juan123";
		$user1->save();
		$user2 = new User();
		$user2->name = "Juan De la Torre";
		$user2->email = "juan_de_la_torre@gmail.com";
		$user2->password = "juan321";
		$user2->save();
		$user3 = new User();
		$user3->name = "Juanito";
		$user3->email = "juanito@gmail.com";
		$user3->password = "juanito321";
		$user3->save();
		return array($user1, $user2, $user3);
	}

	private function find_in_list($list, $val, $name, $pass, $email) {
		for($i=0; $i< $list->count(); $i++) {
			if($name) {
				if($list[$i]->name == $val) {
					return true;
				}
			}

			if($email) {
				if($list[$i]->email == $val) {
					return true;
				}
			}

			if($pass) {
				if($list[$i]->password == $val) {
					return true;
				}
			}
		}

		return false;
	}

	/**
	 * @test
	 */
	public function list_users_controller() {
		// Create 3 new users
		$users_setup = $this->list_setup();
		$user_controller = new UserController();
		$users = $user_controller->list_users(null, "Juan");
		if(is_bool($users)) $this->assertTrue(false); // Autofail
		else {
			$this->assertTrue($this->find_in_list($users, $users_setup[0]->name, true, false, false));
			$this->assertTrue($this->find_in_list($users, $users_setup[1]->name, true, false, false));
			$this->assertTrue($this->find_in_list($users, $users_setup[2]->name, true, false, false));
			$this->assertTrue($this->find_in_list($users, $users_setup[0]->email, false, false, true));
			$this->assertTrue($this->find_in_list($users, $users_setup[1]->email, false, false, true));
			$this->assertTrue($this->find_in_list($users, $users_setup[2]->email, false, false, true));
			$this->assertTrue($this->find_in_list($users, $users_setup[0]->password, false, true, false));
			$this->assertTrue($this->find_in_list($users, $users_setup[1]->password, false, true, false));
			$this->assertTrue($this->find_in_list($users, $users_setup[2]->password, false, true, false));
		}
	}
}
