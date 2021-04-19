<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
	// created_at and modified_at come as default
	
	protected $fillable = [
		'title', 'url', 'image', 'views_counter', 'ranking_type', 
		'views_counter', 'ranking_type', 'is_active',
	];
}
