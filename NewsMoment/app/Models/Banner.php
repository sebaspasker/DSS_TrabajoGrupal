<?php
// TODO: correct folder implementation
namespace App\Models;


class Banner {
	private $title = string;
	private $url = string;
	private $image = string;
	private $views_counter = int;
	private $ranking_type = int;
	private $created = string;
	private $modified = string;
	private $is_active = bool;

	public function __construct($title = "", $url = "", $image = "",
																$ranking_type = 0, $is_active = false) {

		// TODO: Create restrictions
		$this->title = $title;
		$this->url = $url;
		$this->image = $image;
		$this->is_active = $is_active;

		if ($ranking_type > 0) $this->ranking_type = $ranking;
	}
}

