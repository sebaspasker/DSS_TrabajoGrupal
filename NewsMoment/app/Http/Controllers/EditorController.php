<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Editor;

class EditorController extends Controller
{
	private $editor;
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

	public function insert_editor($in_editor) {
	}
}
