<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{	
	protected $fillable = [
		'subtitle','slugname', 'active', 'title',
		'source', 'image_url', 'video_url', 'has_video', 
		'views_counter', 'category', 'editor_email'
	];
}
