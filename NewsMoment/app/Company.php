<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table = 'companies';

	/**
	 * Relation 1 to N
	 */
	public function get_banners() {
		return $this->hasMany(Banner::class);
	}
}
