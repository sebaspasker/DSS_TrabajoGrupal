<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\User;

class UserTest_2 extends TestCase
{
	private function returnUser1() {
		$user = new User();
		$user->name = 'Joaquin De La Vega Torrejón';
		$user->email = 'joaquindelavegatorrejon@gmail.com';
		$user->password = 'No te pongas chul0';
		return $user;
	}

	private function comprobeUserExist($user) {
		if($user == null) return false;
		$user_e = User::where('email', $user->email)->first();
		if($user_e != null) {
			return true;
		} else {
			return false;
		}
	}

	private function deleteUser($user) {
		if($this->comprobeUserExist($user)) {
			$user_e = User::where('email', $user->email)->first();
			$user_e->delete();
		}
	}

	private function insertUser($user) {
		if(!$this->comprobeUserExist($user)) {
			$user->save();
		} else {
			$this->deleteUser($user);
			$user->save();
		}
	}

	public function testInsertUser1() {
		$user = $this->returnUser1();
		$this->deleteUser($user);
		$boolean_value = $user->insert();
		$this->assertTrue($boolean_value);
		$this->assertNotNull(User::where('email', $user->email)->first());
		$this->deleteUser($user);
	}

	public function testInsertUserEmptyEmail() {
		$user = $this->returnUser1();
		$this->deleteUser($user);
		$user->email = '';
		$boolean_value = $user->insert();
		$this->assertFalse($boolean_value);
	}

	public function testInsertUserEmptyName() {
		$user = $this->returnUser1();
		$this->deleteUser($user);
		$user->password = '';
		$boolean_value = $user->insert();
		$this->assertFalse($boolean_value);
		$this->deleteUser($user);
	}

	public function testInsertUserEmptyPassword() {
		$user = $this->returnUser1();
		$this->deleteUser($user);
		$user->password = '';
		$boolean_value = $user->insert();
		$this->assertFalse($boolean_value);
		$this->deleteUser($user);
	}

	public function testRemoveUser1() {
		$user = $this->returnUser1();
		$this->insertUser($user);
		$user->remove();
	}

}
