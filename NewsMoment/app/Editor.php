<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{	
	protected $fillable = [
		'description', 'profile_image','facebook', 'email',
		'instagram', 'twitter', 'is_admin', 'is_active',
	];

	/**
	 * Relation 1 to 1 User
	 */
	public function get_user() {
		return $this->belongsTo(User::class);
	}

	public function get_publications() {
		return $this->hasMany(Publication::class);
	}
}
