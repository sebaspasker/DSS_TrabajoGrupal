<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
	// created_at and modified_at come as default
	
	protected $fillable = [
		'title', 'url', 'ranking_type', 
		'views_counter', 'is_active', 'image_url', 'company_name'
	];

	/**
	 * Relation 1 to N Company
	 */
	public function get_company() {
			return $this->belongsTo(Company::class);
	}
}
