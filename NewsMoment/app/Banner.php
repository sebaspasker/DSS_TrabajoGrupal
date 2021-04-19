<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
	protected $title = string;
	protected $url = string;
	protected $image = string;
	protected $views_counter = int;
	protected $ranking_type = int;
	protected $created = string;
	protected $modified = string;
	protected $is_active = bool;

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
