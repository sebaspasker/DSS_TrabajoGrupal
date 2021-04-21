<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
	private $category;

	
	private function insert_data_category($name, $slugname, $imagen) : Category {
		$category = new Category();

		if($name != "") {
			$category->name = $name;
		}

		if($slugname != "") {
			$category->slugname = $slugname;
		}

		if($imagen != "") {
			$category->imagen = $imagen;
		}

		return $category;
	}


	public function insert_category($in_category = null, $name = "", $slugname = "", $imagen = "") : bool {
		if($in_category != null) $category = $in_category;
		else $category = $this->insert_data_category($name, $slugame, $imagen);
			
		try {
			if(empty($category->name)) throw new Exception("Name can't be empty");
			$category->save();
		} catch(exception $e) {
			return false;
		}

		return true;
	}


	
	public function delete_category($in_category = null, $name = "") : bool {
		if(!empty($in_category->name)) $name = $in_category->name;
		try {
			$old_category = Category::where('name', $name)->first();
			if ($old_category == null) throw new Exception('None category to delete');
			else $old_category->delete();
		} catch(exception $e) {
			return false;
		}

		return true;
	}


	public function modify_category($in_category = null, $name = "", $slugname = "", $imagen = "") : bool {
		if($in_category != null) $category = $in_category;
		else $category = $this->insert_data_category($name, $slugname, $imagen);

		try {
			$old_category = new Category();
			$old_category = Category::where('name', $category->name)->first();
			if($old_category == null) throw new Exception("None category to modify");
			else {
				$old_category->imagen = $category->imagen;
				$old_category->slugname = $category->slugname;
				$old_category->save();
			}
		} catch (Exception  $e) {
			return false;
		}

		return true;
	}

	public function list_category($in_category = null, $name = "") {
		if($in_category != null) $name = $in_category->name;

		$category = Category::where('name', 'LIKE', "%$name%")->get();
		if($category == null) return false;
		return $category;
	}
}
