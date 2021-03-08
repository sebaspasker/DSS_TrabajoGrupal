<?php
// TODO: Correct folder implementation
namespace App\Models;

use App\User;
use App\Models\Publication;

class Editor extends User {
	private $description = string;

	// Link to image
	private $profile_image = string;

	// Social media
	private $facebook = string; 
	private $instagram = string;
	private $twitter = string;

	// Editor created and modified Date
	private $created = date;
	private $modified = date;

	// Conditionals
	private $is_admin; // Editor is also a page admin
	private $is_active; // Editor is actually an active publisher

	// Publications array 
	// A Editor can have various publications
	// A Publication must have a editor
	private $publications_array = array();
	
	public function __construct($descr = "", $profile = "", $facebook = "", $instagram = "", 
																$twitter = "", $is_admin = false, $is_active = false, 
																$publ_arr = array()) {

		// TODO: add restrictions
		$this->description = $descr;
		$this->profile_image = $profile;
		$this->facebook = $facebook;
		$this->instagram = $instagram;
		$this->twitter = $twitter;
		$this->is_admin = $is_admin;
		$this->is_active = $is_active;
		$this->publications_array = $publ_arr;

		// Init to actual time
		$this->created = strtotime("now");
		$this->modified = strtotime("now");
	}
}
