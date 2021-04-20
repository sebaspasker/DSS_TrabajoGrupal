<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{	
	protected $fillable = [
		'description', 'profile_image','facebook', 'email',
		'instagram', 'twitter', 'is_admin', 'is_active',
	];

	public function user() {
		return $this->hasOne(User::class);
	}
}
