<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table = 'companies';

	protected $fillable = [
		'name', 'image_url','is_active'
	];

	/**
	 * Relation 1 to N
	 */
	public function get_banners() {
		return $this->hasMany(Banner::class);
	}

	public function exist() : bool {
		return self::where('name', '=', $this->name)->exists();
	}
}
