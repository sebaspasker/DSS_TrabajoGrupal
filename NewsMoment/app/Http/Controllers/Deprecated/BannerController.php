<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Banner;
use Exception;

class BannerController extends Controller
{
	/**
	 * @var Banner Model
	 */
	public $banner;


	/**
	 * @var Company Model
	 */
	public $company;

	function __construct() {
		$this->banner = new Banner();
		$this->company = new Company();
	}

	/** Insert a banner
	 * @val in_banner Banner model
	 * @return bool 
	 */
	public function insert_banner($in_banner = null) {
		if($in_banner != null) $this->banner = $in_banner;

		try {
			if(empty($this->banner->company_name)) throw new Exception("Company name can't be empty");
			if(empty($this->banner->title)) throw new Exception("Title can't be empty");
			// Insert banner
			$this->banner->save();
		} catch(exception $e) {
			return false;
		}

		return true;
	}

	/**
	 * Delete a banner
	 * @val in_banner Banner model
	 * @return bool
	 */
	public function delete_banner($in_banner = null) {
			if($in_banner != null) $title = $in_banner->title;
			else $title = $this->banner->title;

		try {
			$old_banner = Banner::where('title', $title)->first();
			if($old_banner == null) throw new Exception("None banner to delete");
			else $old_banner->delete(); // Delete banner
		} catch (Exception $e) {
			return false;
		}

	return true;

	}

	/**
	 * Modify a banner
	 * @val in_banner Banner Model
	 * @return bool
	 */
	public function modify_banner($in_banner = null) {
		if($in_banner != null) $this->banner = $in_banner;

		try {
			// Search banner in database
			$old_banner = Banner::where('title', $this->banner->title)->first();
			if($old_banner == null) throw new Exception("None banner to modify");
			else {
				// Modify values
				if($old_banner->url != $this->banner->url) 
					$old_banner->url = $this->banner->url;

				if($old_banner->ranking_type != $this->banner->ranking_type) 
					$old_banner->ranking_type = $this->banner->ranking_type;

				if($old_banner->views_counter != $this->banner->views_counter) 
					$old_banner->views_counter = $this->banner->views_counter;

				if($old_banner->is_active != $this->banner->is_active) 
					$old_banner->is_active = $this->banner->is_active;

				if($old_banner->image_url != $this->banner->image_url) 
					$old_banner->image_url = $this->banner->image_url;
				$old_banner->save(); // Save values in banner
			}
		} catch (Exception $e) {
			return false;	
		}

		return true;
	}

	/**
	 * List banners search
	 * @val in_banner Banner Model
	 * @val company_name 
	 * @return bool or array
	 */
	public function list_banners($in_banner = null, $title = "") {
		if($title == "") {
			if($in_banner != null) $title = $in_banner->title;
			else $title = $this->banner->title;
		}

		try {
			// Search banners
			$banners = Banner::where('title', 'LIKE', "%$title%")->get();
			if($banners == null) return false;
			else {
				return $banners;
			}
		} catch(exception $e) {
			return false;
		}

		return false;
	}
}
