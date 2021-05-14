<?php

/**
 * 
 * DEPRECATED
 *
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Exception;

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
	protected function insert_data_user($name, $email, $password) : User {
		$user = new User();
		if($name != "") {
			$user->name = $name;
		}

		if($email != "") {
			$user->email = $email;
		}

		if($password != "") {
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
		if($in_user != null) $user = $in_user;
		else $user = $this->insert_data_user($name, $email, $password);
			
		try {
			if(empty($user->email)) throw new Exception("Email can't be empty");
			$user->save();
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
		if(!empty($in_user->email)) $email = $in_user->email;
		try {
			$old_user = User::where('email', $email)->first();
			if ($old_user == null) throw new Exception('None user to delete');
			else $old_user->delete();
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
		if($in_user != null) $user = $in_user;
		else $user = $this->insert_data_user($name, $email, $password);

		try {
			$old_user = User::where('email', $user->email)->first();
			if($old_user == null) throw new Exception("None user to modify");
			else {
				if($user->name != "") $old_user->name = $user->name;
				if($user->password != "") $old_user->password = $user->password;
				$old_user->save();
			}
		} catch (Exception  $e) {
			return false;
		}

		return true;
	}

	public function list_users($in_user = null, $name = "") {
		if($in_user != null) $name = $in_user->name;

		$users = false;
		try {
			$users = User::where('name', 'LIKE', "%$name%")->get();
			if($users == null) return false;
		} catch(exception $e) {
			return false;
		}

		return $users;
	}
}


