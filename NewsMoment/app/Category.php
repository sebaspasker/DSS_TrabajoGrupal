<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = [
		'name', 'slugname', 'imagen'
	];

	public function get_publications() {
		return $this->hasMany(Publication::class);
	}
}
