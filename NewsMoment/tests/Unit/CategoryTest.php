<?php

namespace Tests\Unit;

use Tests\TestCase; 
use App\Category;
use App\Http\Controllers\CategoryController;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
	/** @test */
	public function correct_category_save()
	{
		$category_exist = Category::where('name', 'Guerra')->first();
		if($category_exist != null) { 
		 	$category_exist->delete(); 
		} 

		$category = new Category();
		$category->name = 'Guerra';
		$category->slugname = 'enlace1';
		$category->imagen = 'imagen1';
		$category->save();

		$category_find = Category::where('name', 'Guerra')->first();

		$this->assertEquals($category_find->name, 'Guerra');
		$this->assertEquals($category_find->slugname, 'enlace1'); 
		$this->assertEquals($category_find->imagen, 'imagen1');
		$category->delete();
	}
	
	/**
	 * @test
	 */
	public function insert_category_controller() {
		$category_exist = Category::where('name', 'Futbol')->first();
		if($category_exist != null) { 
		 	$category_exist->delete(); 
		} 

		$category = new Category();
		$category->name = "Futbol";
		$category->slugname = "enlace2";
		$category->imagen = "imagen2";
		$category_controller = new CategoryController();
		$val = $category_controller->insert_category(null, $category->name, $category->slugname, $category->imagen);
		$this->assertTrue($val);
		$this->assertDatabaseHas('categories', [
			'name' => $category->name,
			'slugname' => $category->slugname,
			'imagen' => $category->imagen,
		]);

		$category->delete();
	}

	/**
	 * @test
	 */
	public function insert_category_controller_category_input() {
		$category_exist = Category::where('name', 'Tenis')->first();
		if($category_exist != null) { 
		 	$category_exist->delete(); 
		} 

		$category = new Category();
		$category->name = "Tenis";
		$category->slugname = "enlace3";
		$category->imagen = "imagen3";
		$category_controller = new CategoryController();
		$val = $category_controller->insert_category($category); 
		$this->assertTrue($val);
		$this->assertDatabaseHas('categories', [
			'name' => $category->name,
			'slugname' => $category->slugname,
			'imagen' => $category->imagen,
		]);

		$category->delete();
	}

	/**
	 * @test
	 */
	public function insert_category_empty_values() {
		$category = new Category();
		$category->name = "";
		$category->slugname = "";
		$category->imagen = "";
		$category_controller = new CategoryController();
		$val = $category_controller->insert_category($category);
																				 
		$this->assertFalse($val);
	}

	/**
	 * @test
	 */
	public function delete_category_controller() {
		$category_exist = Category::where('name', 'Deporte')->first();
		if($category_exist != null) { 
		 	$category_exist->delete(); 
		} 

		$category = new Category();
		$category->name = "Deporte";
		$category->slugname = "enlace4";
		$category->imagen = "imagen4";
		$category->save();
		$category_controller = new CategoryController();
		$val = $category_controller->delete_category(null, $category->name);
		$this->assertNull(Category::where('name', 'Deporte')->first());
		$this->assertTrue($val);
		if($val == false) $category->delete();
	}

	/**
	 * @test
	 */
	public function delete_category_controller_category_input() {
		$category_exist = Category::where('name', 'Deporte')->first();
		if($category_exist != null) { 
		 	$category_exist->delete(); 
		} 

		$category = new Category();
		$category->name = "Deporte";
		$category->slugname = "enlace4";
		$category->imagen = "imagen4";
		$category->save();
		$category_controller = new CategoryController();
		$val = $category_controller->delete_category($category);
		$this->assertNull(Category::where('name', 'Deporte')->first());
		$this->assertTrue($val);
		if($val == false) $category->delete();
	}

	/**
	 * @test
	 */
	public function delete_category_empty_values() {
		$category = new Category();
		$category->name = "";
		$category->slugname = "";
		$category->imagen = "";
		$category_controller = new CategoryController();
		$val = $category_controller->delete_category($category);
		$this->assertFalse($val);
	}

	/**
	 * @test
	 */
	public function modify_category_controller() {
		$category_exist = Category::where('name', 'Deporte')->first();
		if($category_exist != null) { 
		 	$category_exist->delete(); 
		} 

		$category = new Category();
		$category->name = "Deporte";
		$category->slugname = "enlace4";
		$category->imagen = "imagen4";
		$category->save();
		$category_controller = new CategoryController();
		$category->imagen = "imagen5";
		$category->slugname = "enlace5";
		$val = $category_controller->modify_category(null, $category->name, $category->slugname, $category->imagen);
		$this->assertTrue($val);
		$category_modified = Category::where('name', 'Deporte')->first();
		$this->assertEquals($category_modified->name, $category->name);
		$this->assertEquals($category_modified->slugname, $category->slugname);
		$this->assertEquals($category_modified->imagen, $category->imagen);
		$category_modified->delete();
	}

	/**
	 * @test
	 */
	public function modify_category_controller_category_input() {
		$category_exist = Category::where('name', 'Deporte')->first();
		if($category_exist != null) { 
		 	$category_exist->delete(); 
		} 

		$category = new Category();
		$category->name = "Deporte";
		$category->slugname = "enlace4";
		$category->imagen = "imagen4";
		$category->save();
			
		$category->imagen = "imagen5";
		$category->slugname = "enlace5";
		$category_controller = new CategoryController();
		$val = $category_controller->modify_category($category);
		$this->assertTrue($val);
		$category_modified = Category::where('name', 'Deporte')->first();
		$this->assertEquals($category_modified->name, $category->name);
		$this->assertEquals($category_modified->slugname, $category->slugname);
		$this->assertEquals($category_modified->imagen, $category->imagen);
		$category_modified->delete();
	}

	public function modify_category_empty_values() {
		$category = new Category();
		$category->name = "";
		$category->slugname = "";
		$category->imagen = "";
			

		$category_controller = new CategoryController();
		$val = $category_controller->modify_category($category);
		$this->assertFalse($val);
	}

	private function delete_list_setup() {
		$category_exist = Category::where('name', 'Eyou')->first();
		if($category_exist != null) { 
		 	$category_exist->delete(); 
		} 

		$category_exist = Category::where('name', 'Covid')->first();
		if($category_exist != null) { 
		 	$category_exist->delete(); 
		} 

		$category_exist = Category::where('name', 'Flores')->first();
		if($category_exist != null) { 
		 	$category_exist->delete(); 
		} 
	}

	private function list_setup() {
		$this->delete_list_setup();
		// Create 3 new users
		$category1 = new Category();
		$category1->name = " Eyou";
		$category1->slugname = "enlace6";
		$category1->imagen = "imagen6";
		$category1->save();
		$category2 = new Category();
		$category2->name = " Covid";
		$category2->slugname = "enlace7";
		$category2->imagen = "imagen7";
		$category2->save();
		$category3 = new Category();
		$category3->name = " Flores";
		$category3->slugname = "enlace8";
		$category3->imagen = "imagen8";
		$category3->save();
		return array($category1, $category2, $category3);
	}

	private function find_in_list($list, $val, $name, $slug, $img) {
		for($i=0; $i< $list->count(); $i++) {
			if($name) {
				print($list[$i]->name);
				if($list[$i]->name == $val) {
					return true;
				}
			}

			if($slug) {
				if($list[$i]->slugname == $val) {
					return true;
				}
			}

			if($img) {
				if($list[$i]->imagen == $val) {
					return true;
				}
			}
		}

		return false;
	}

	/**
	 * @test
	 */
	public function list_categorys_controller() {
		// Create 3 new users
		$category_setup = $this->list_setup();
		$category_controller = new CategoryController();
		$category = $category_controller->list_category(null, "Universidad");
		if(is_bool($category)) $this->assertTrue(false); // Autofail
		else {
			$this->assertEquals($category->count(), 3);
			$this->assertTrue($this->find_in_list($category, $category_setup[0]->name, true, false, false));
			$this->assertTrue($this->find_in_list($category, $category_setup[1]->name, true, false, false));
			$this->assertTrue($this->find_in_list($category, $category_setup[2]->name, true, false, false));
			$this->assertTrue($this->find_in_list($category, $category_setup[0]->imagen, false, false, true));
			$this->assertTrue($this->find_in_list($category, $category_setup[1]->imagen, false, false, true));
			$this->assertTrue($this->find_in_list($category, $category_setup[2]->imagen, false, false, true));
			$this->assertTrue($this->find_in_list($category, $category_setup[0]->slugname, false, true, false));
			$this->assertTrue($this->find_in_list($category, $category_setup[1]->slugname, false, true, false));
			$this->assertTrue($this->find_in_list($category, $category_setup[2]->slugname, false, true, false));
		}
	}

}
