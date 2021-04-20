<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	private $user;
	/** 
	 * Pass params to new User
	 * @return App\User User
	 * @var name - users name
	 * @var email - users email
	 * @var password - users password
	 */
	private function insert_data_user($name, $email, $password) : User {
		$user = new User();
		if($name != "") {
			$user->name = $name;
		}

		if($email = "") {
			$user->email = $email;
		}

		if($password = "") {
			$user->password = $password;
		}

		return $user;
	}


	/**
	 * Insert a user in database
	 * @return bool
	 * @var name - users name
	 * @var email - users email
	 * @var password - users password
	 * @var in_user - user, default null
	 */
	public function insert_user($in_user = null, $name = "", $email = "", $password = "") : bool {
		if($in_user != null && $in_user === User::class) $user = $in_user;
		else $user = insert_data_user($name, $email, $password);
			
		try {
			$user.save();
		} catch(exception $e) {
			return false;
		}

		return true;
	}


	/**
	 * Delete a user in database
	 * @return bool
	 * @var email - users email
	 * @var in_user - user, default null
	 */
	public function delete_user($in_user = null, $email = "") : bool {
		if($in_user != null && $in_user === User::class) $user = $in_user;
		else $user = insert_data_user("", $email, "");

		try {
			$user = User::where('email', $email)->first();
			if($user == null) throw new Exception();
			else $user->delete();
		} catch(exception $e) {
			return false;
		}

		return true;
	}

	/**
	 * Modify a user in database
	 * @return App\User User
	 * @var name - users name
	 * @var email - users email
	 * @var password - users password
	 * @var in_user - user, default null
	 */
	public function modify_user($in_user = null, $name = "", $email = "", $password = "") : bool {
		if($in_user != null && $in_user === User::class) $user = $in_user;
		else $user = insert_data_user($name, $email, $password);

		try {
			$old_user = User::where('email', $email)->first();
			if($old_user == null) throw new Exception();
			else {
				$old_user->name = $user->name;
				$old_user->password = $user->password;
				$old_user->save();
			}
		} catch (Exception  $e) {
			return false;
		}

		return true;
	}
}
