<?php
// TODO: Correct folder implementation
namespace App\Models;

class Publication {
	private $title = string;
	private $subtitle = string;

	// Special format title
	private $slugname = string;

	private $active = bool;

	// Link to the source
	private $source = string;

	// Link to the image
	private $image = string;

	// Link to the video
	private $video_url = string;
	private $has_video = bool;

	private $views_counter = int;

	// Publication data 
	private $created = date;
	private $modified = date;

	// Publication category
	private $category;

	public function __construct($title = "", $subtitle = "", 
																$active = false, $source = "", $image = "", 
																$video_url = "", $has_video = false, $category = "", 
																$views_counter = 0) {
		
		// TODO: add restrictions
		$this->title = $title;
		$this->slugname = str_slug($title, "-");
		$this->subtitle = $subtitle;
		$this->active = $active;
		$this->source = $source;
		$this->image = $image;
		$this->video_url = $video_url;
		$this->has_video = $has_video;
		$this->category = $category;

		// Init to actual time
		$this->created = strtotime("now");
		$this->modified = strtotime("now");

		if($views_counter >= 0) $this->views_counter = $views_counter;
	}
}

