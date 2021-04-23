<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Editor;
use Exception;

class EditorController extends Controller
{
	/**
	 * @var Editor Model
	 */
	public $editor;


	/**
	 * @var User Model
	 */
	public $user;

	function __construct() {
		$this->editor = new Editor();
		$this->user = new User();
	}

	/** 
	 * Create a editor and add parameters passed inside
	 * @return Editor Model
	 */
	private function insert_data_editor($email, $description, $profile_image, 
																			$instagram, $twitter, $facebook, 
																			$is_admin, $is_active) {
		$_editor = new Editor();
		$_editor->email = $email;	
		$_editor->description = $description; 
		$_editor->profile_image = $profile_image;
		$_editor->instagram = $instagram;
		$_editor->twitter = $twitter;
		$_editor->facebook = $facebook;
		$_editor->is_admin = $is_admin;
		$_editor->is_active = $is_active;
		return $_editor;
	}

	/**
	 * Insert a user and after a related editor
	 * @val in_user User model
	 * @val in_editor Editor model
	 * @return bool
	 */
	public function insert_user_editor($in_user = null, $in_editor = null) {
		if($in_user != null) $this->user = $in_user;
		if($in_editor != null) $this->editor = $in_editor;

		// If not related return false
		if($this->editor->email != $this->user->email) return false;

		// Insert user
		$user_controller = new UserController();
		$user_inserted = $user_controller->insert_user($this->user);

		if($user_inserted) {
			// Insert editor
			$editor_inserted = $this->insert_editor($this->editor);
			if(!$editor_inserted) return false;
		} else {
			return false; // Case user not inserted
		}

		return true;
	}

	/** Insert a editor
	 * @val in_editor Editor model
	 * @return bool 
	 */
	public function insert_editor($in_editor = null) {
		if($in_editor != null) $this->editor = $in_editor;

		try {
			if(empty($this->editor->email)) throw new Exception("Email can't be empty");
			// Insert editor
			$this->editor->save();
		} catch(exception $e) {
			return false;
		}

		return true;
	}

	/**
	 * Delete a editor
	 * @val in_editor Editor model
	 * @val email string
	 * @return bool
	 */
	public function delete_editor($in_editor = null, $email = "") {
		/** Look at which editor email use to delete
			* $email > $in_editor->email > $this->editor->email */
		if($email == "") {
			if($in_editor != null) {
				$email = $in_editor->email;
			} else if($this->editor->email != "") $email = $this->editor->email;
			else return false;
		}

		try {
			$old_editor = Editor::where('email', $email)->first();
			if($old_editor == null) throw new Exception("None user to delete");
			else $old_editor->delete(); // Delete editor
		} catch (Exception $e) {
			return false;
		}

	return true;

	}

	/**
	 * Delete a related user and editor
	 * @val $editor Editor model
	 * @val email string
	 * @return bool
	 */
	public function delete_user_editor($in_editor = null, $email = "") {
		// Save email
		if($in_editor != null) $this->editor = $in_editor;
		else if($email != "") $this->editor->email = $email;

		try {
			// Search editor
			$old_editor = Editor::where('email', $this->editor->email)->first();
			if($old_editor == null) throw new Exception("None editor to delete");
			else $old_editor->delete(); // delete editor

			// Search user
			$old_user = User::where('email', $this->editor->email)->first();
			if($old_user == null) throw new Exception("None user to delete");
			else $old_user->delete(); // delete user
		} catch (exception $e) {
			return false;
		}

		return true;
	}

	/**
	 * Modify a editor
	 * @val in_editor Editor Model
	 * @return bool
	 */
	public function modify_editor($in_editor = null) {
		if($in_editor != null) $this->editor = $in_editor;

		try {
			// Search editor in database
			$old_editor = Editor::where('email', $this->editor->email)->first();
			if($old_editor == null) throw new Exception("None editor to modify");
			else {
				// Modify values
				if($this->editor->description != "") $old_editor->description = $this->editor->description;
				if($this->editor->profile_image != "") $old_editor->profile_image = $this->editor->profile_image;
				if($this->editor->facebook != "") $old_editor->facebook = $this->editor->facebook;
				if($this->editor->twitter != "") $old_editor->twitter = $this->editor->twitter;
				if($this->editor->instagram != "") $old_editor->instagram = $this->editor->instagram;
				if($old_editor->is_admin != $this->editor->is_admin) $old_editor->is_admin = $this->editor->is_admin;
				if($old_editor->is_active != $this->editor->is_active) $old_editor->is_active = $this->editor->is_active;
				$old_editor->save(); // Save values in editor
			}
		} catch (Exception $e) {
			return false;	
		}

		return true;
	}

	/**
	 * List editors search
	 * @val in_editor Editor Model
	 * @val email 
	 * @return bool or array
	 */
	public function list_editors($in_editor = null, $email = "") {
		if($email == "") {
			if($in_editor != null) $email = $in_editor->email;
			else $email = $this->editor->email;
		}

		$editors = false;
		try {
			// Search editors
			$editors = Editor::where('email', 'LIKE', "%$email%")->get();
			if($editors == null) return false;
		} catch(exception $e) {
			return false;
		}
		return $editors;
	}
}

