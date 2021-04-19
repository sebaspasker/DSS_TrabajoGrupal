<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
	protected $title = string;
	protected $subtitle = string;

	// Special format title
	protected $slugname = string;

	protected $active = bool;

	// Link to the source
	protected $source = string;

	// Link to the image
	protected $image = string;

	// Link to the video
	protected $video_url = string;
	protected $has_video = bool;

	protected $views_counter = int;

	// Publication data 
	protected $created = date;
	protected $modified = date;

	// Publication category
	protected $category;

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
