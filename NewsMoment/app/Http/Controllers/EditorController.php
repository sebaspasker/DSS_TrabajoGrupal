<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Editor;

class EditorController extends Controller
{
	public $editor;
	public $user;
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

	public function insert_user_editor($in_user = null, $in_editor = null) {
		if($user != null) $this->user = $in_user;
		if($editor != null) $this->editor = $in_editor;

		if($this->editor->email != $this->user->email) return false;

		$user_controller = new UserController();
		$user_inserted = $user_controller->insert_user($this->user);

		if($user_inserted) {
			$editor_inserted = $this->insert_editor($this->editor);
			if(!$editor_inserted) return false;
		} else {
			return false;
		}

		return true;
	}

	public function insert_editor($in_editor = null) {
		if($in_editor != null) $this->editor = $in_editor;

		try {
			if(empty($this->editor->email)) throw new Exception("Email can't be empty");
			$this->editor->save();
		} catch(exception $e) {
			return false;
		}

		return true;
	}

	public function delete_editor($in_editor = null, $email = "") {
		if($email == "") {
			if($in_editor != null) $email  = $in_editor->$email;
			else if($this->editor->email != "") $email = $this->editor->email;
			else return false;
		}

		try {
			$old_editor = Editor::where('email', $email)->first();
			if($old_editor == null) throw new Exception("None user to delete");
			else $old_editor->delete();
		} catch (Exception $e) {
			return false;
		}

		return true;
	}

	public function delete_user_editor($editor = null) {
		if($editor != null) $this->editor = $editor;
		try {
			$old_editor = Editor::where('email', $editor->email)->first();
			if($old_editor == null) throw new Exception("None editor to delete");
			else $old_editor->delete();

			$old_user = User::where('email', $editor->email)->first();
			if($old_user == null) throw new Exception("None user to delete");
			else $old_user->delete();
		} catch (exception $e) {
			return false;
		}

		return true;
	}

	public function modify_editor($in_editor = null) {
		if($in_editor != null) $this->editor = $in_editor;

		try {
			$old_editor = Editor::where('email', $this->editor->email)->first();
			if($old_editor == null) throw new Exception("None editor to modify");
			else {
				if($this->editor->description != "") $old_editor->description = $editor->description;
				if($this->editor->profile_image != "") $old_editor->profile_image = $editor->profile_image;
				if($this->editor->facebook != "") $old_editor->facebook = $editor->facebook;
				if($this->editor->twitter != "") $old_editor->twitter = $editor->twitter;
				if($this->editor->instagram != "") $old_editor->instagram = $editor->instagram;
				if($old_editor->is_admin != $this->editor->is_admin) $old_editor->is_admin = $this->editor->is_admin;
				if($old_editor->is_active != $this->editor->is_active) $old_editor->is_active = $this->editor->is_active;
				$old_user->save();
			}
		} catch (Exception $e) {
			return false;	
		}
	}

	public function list_editors($in_editor = null, $name = "") {
		if($in_editor != null) $name = $in_editor->name;

		$editors = false;
		try {
			$editors = User::where('name', 'LIKE', "%$name%")->get();
			if($editors == null) return false;
		} catch(exception $e) {
			return false;
		}
		return $editors;
	}
}

