<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
	protected $description = string;

	// Link to image
	protected $profile_image = string;

	// Social media
	protected $facebook = string; 
	protected $instagram = string;
	protected $twitter = string;

	// Editor created and modified Date
	protected $created = date;
	protected $modified = date;

	// Conditionals
	protected $is_admin; // Editor is also a page admin
	protected $is_active; // Editor is actually an active publisher

	// Publications array 
	// A Editor can have various publications
	// A Publication must have a editor
	protected $publications_array = array();
	
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
