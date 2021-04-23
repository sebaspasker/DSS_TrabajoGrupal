<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use App\Category;
use App\Banner;
use Exception;

class PublicationController extends Controller
{
	/**
	 * @var Publication Model
	 */
	public $publication;


	/**
	 * @var Category Model
	 */
	public $category;

	function __construct() {
		$this->publication = new Publication();
		$this->category = new Category();
	}

	/** Insert a publication
	 * @val in_publication Publication model
	 * @return bool 
	 */
	public function insert_publication($in_publication = null) {
		if($in_publication != null) $this->publication = $in_publication;

		try {
			if(empty($this->publication->category)) throw new Exception("Category name can't be empty");
			if(empty($this->publication->title)) throw new Exception("Title can't be empty");
			// Insert publication
			$this->publication->save();
		} catch(exception $e) {
			return false;
		}

		return true;
	}

	/**
	 * Delete a publication
	 * @val in_publication Publication model
	 * @return bool
	 */
	public function delete_publication($in_publication = null) {
			if($in_publication != null) $title = $in_publication->title;
			else $title = $this->publication->title;

		try {
			$old_publication = Publication::where('title', $title)->first();
			if($old_publication == null) throw new Exception("None publication to delete");
			else $old_publication->delete(); // Delete publication
		} catch (Exception $e) {
			return false;
		}

	return true;

	}

	/**
	 * Modify a publication
	 * @val in_publication Publication Model
	 * @return bool
	 */
	public function modify_publication($in_publication = null) {
		if($in_publication != null) $this->publication = $in_publication;

		try {
			// Search publication in database
			$old_publication = Publication::where('title', $this->publication->title)->first();
			if($old_publication == null) throw new Exception("None publication to modify");
			else {
				// Modify values
				if($old_publication->slugname != $this->publication->slugname) 
					$old_publication->slugname = $this->publication->slugname;

				if($old_publication->views_counter != $this->publication->views_counter) 
					$old_publication->views_counter = $this->publication->views_counter;

				if($old_publication->active != $this->publication->active) 
					$old_publication->active = $this->publication->active;

				if($old_publication->has_video != $this->publication->has_video) 
					$old_publication->has_video = $this->publication->has_video;

				if($old_publication->image_url != $this->publication->image_url) 
					$old_publication->image_url = $this->publication->image_url;

				if($old_publication->video_url != $this->publication->video_url) 
					$old_publication->video_url = $this->publication->video_url;


				if($old_publication->source != $this->publication->source) 
					$old_publication->source = $this->publication->source;

				if($old_publication->subtitle != $this->publication->subtitle) 
					$old_publication->subtitle = $this->publication->subtitle;

				$old_publication->save(); // Save values in publication
			}
		} catch (Exception $e) {
			return false;	
		}

		return true;
	}

	/**
	 * List publications search
	 * @val in_publication Publication Model
	 * @val category_name 
	 * @return bool or array
	 */
	public function list_publications($in_publication = null, $category_name = "") {
		if($category_name == "") {
			if($in_publication != null) $category_name = $in_publication->category_name;
			else $category_name = $this->publication->category_name;
		}

		$publications = false;
		try {
			// Search publications
			$publications = Publication::where('category_name', 'LIKE', "%$category_name%")->get();
			if($publications == null) return false;
		} catch(exception $e) {
			return false;
		}
		return $publications;
	}

	/**
	 * Get x last publications id
	 * @val number 
	 */
	public function get_last_publications($category_name = null, $number = 0) {
		if($category_name == null) $publications = Publication::all();
		else $publications = Publication::where('category', $category_name)->get();
		$total = $publications->count();
		array_reverse($publications->toArray());
		$x_publication = array();
		for($i=0; $i< $number; $i++) {
			array_push($x_publication, $publications[$i]);
		}

		return $x_publication;
	}

	public function home() {
		$publications = Publication::orderBy('id', 'desc')->limit(3)->get();
		$banner = Banner::where('ranking_type', 2)->take(1)->get();

		$info = [
			'publication1' => $publications[0],
			'publication2' => $publications[1],
			'publication3' => $publications[2],
			'banner' => $banner[0],
		];

		return view('public/home', $info);
	}



	public function ultimos() {
		$publications = Publication::orderBy('id', 'desc')->paginate(3);
		return view('public/ultimos', ['publications' => $publications]);
	}


	public function buscar(Request $request) {
		$query = $request->get('q');

		$info = [
			'publications' => Publication::orWhere('title', 'LIKE', "%$query%")->orWhere('subtitle', 'LIKE', "%$query%")->paginate(3),
			'query' => $query,
		];

		return view('public/buscar', $info);
	}



	public function publicacion() {
		$publications = Publication::orderBy('id', 'desc')->limit(1)->get();
		$banner = Banner::where('ranking_type', 1)->take(2)->get();

		$info = [
			'publication' => $publications[0],
			'banner1' => $banner[0],
			'banner2' => $banner[1],
		];

		return view('public/publicacion', $info);
	}


}
