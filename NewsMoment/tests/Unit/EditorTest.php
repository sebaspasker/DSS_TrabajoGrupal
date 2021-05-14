<?php

namespace Tests\Unit;

use Tests\TestCase; 
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Editor;
use App\User;
use App\Http\Controllers\Deprecated\EditorController;
use Exception;

class EditorTest extends TestCase
{
	public function setUp() : void {
		parent::setUp();

		$user_editor = User::where('name', 'Juan De la Vega')->first();
		if($user_editor != null) {
			$user_editor->delete();
		}
		$user_editor = new User();
		$user_editor->name = "Juan De la Vega";
		$user_editor->password = "Juan123";
		$user_editor->email = "email_user_editor@gmail.com";
		$user_editor->save();
	}

	/**
	 * @test
	 */
	public function correct_editor_save()
	{
		/* $user_editor = User::where('name', 'Juan De la Vega')->first(); */
		/* if($user_editor != null) { */
		/* 	$user_editor ->delete(); */
		/* } */
		/* $user_editor = new User(); */
		/* $user_editor->name = "Juan De la Vega"; */
		/* $user_editor->password = "Juan123"; */
		/* $user_editor->email = "email_user_editor@gmail.com"; */
		/* $user_editor->save(); */

		$editor = new Editor();
		$editor->email = "email_user_editor@gmail.com";
		$editor->description = "Description_editor1";
		$editor->profile_image = "Image_profile1";
		$editor->facebook = "Facebook_editor1";
		$editor->instagram = "Instagram_editor1";
		$editor->twitter = "Twitter_editor1";

		$editor->is_admin = false;
		$editor->is_active = false;
		$editor->save();

		$editor_where = editor::where('email', 'email_user_editor@gmail.com')->first();
		$this->assertEquals($editor_where->email, $editor->email);
		$this->assertEquals($editor_where->description, $editor->description);
		$this->assertEquals($editor_where->profile_image, $editor->profile_image);
		$this->assertEquals($editor_where->facebook, $editor->facebook);
		$this->assertEquals($editor_where->instagram, $editor->instagram);
		$this->assertEquals($editor_where->twitter, $editor->twitter);
		$editor->delete();
	}

	private function return_user_1() : User {
		$user = new User();
		$user->name = "Francisco de la Corte";
		$user->email = "fran_no_te_cortes@gmail.com";
		$user->password = "francito_me_llaman";
		return $user;
	}

	private function return_user_2() : User {
		$user = new User();
		$user->name = "Fran De la No Corte Cortés";
		$user->email = "fran_te_has_cortado@gmail.com";
		$user->password = "francito_me_nombran";
		return $user;
	}

	private function return_user_3() : User {
		$user = new User();
		$user->name = "Francisco del Espino";
		$user->email = "francisco_del_espino@gmail.com";
		$user->password = "francito_me_dicen";
		return $user;
	}

	private function return_editor_1() : Editor{
		$editor = new Editor();
		$editor->email = "fran_no_te_cortes@gmail.com";
		$editor->description = "Esto es una descripcion";
		$editor->profile_image = "imagen/imagen.jpg";
		$editor->instagram = "Fran to weno";
		$editor->twitter = "Fran to weno";
		$editor->facebook = "Fran to weno";
		$editor->is_admin = true;
		$editor->is_active = true;
		return $editor;
	}

	private function return_editor_2() : Editor{
		$editor = new Editor();
		$editor->email = "fran_te_has_cortado@gmail.com";
		$editor->description = "Esto es una descripcion de fran";
		$editor->profile_image = "imagen/imagen.jpgsada";
		$editor->instagram = "Fran to wenooo";
		$editor->twitter = "Fran to wenoopo";
		$editor->facebook = "Fran to wenopp";
		$editor->is_admin = false;
		$editor->is_active = false;
		return $editor;
	}

	private function return_editor_3() : Editor{
		$editor = new Editor();
		$editor->email = "francisco_del_espino@gmail.com";
		$editor->description = "Esto es una descripcion de francisco del espino";
		$editor->profile_image = "imagen/imagen.png";
		$editor->instagram = "Fran to maloo";
		$editor->twitter = "Fran to maloo";
		$editor->facebook = "Fran to maloo";
		$editor->is_admin = false;
		$editor->is_active = true;
		return $editor;
	}

	private function insert_user_1() {
		$this->delete_editor_1();
		$user = $this->return_user_1();
		$user->save();
	}

	private function insert_user_2() {
		$this->delete_editor_2();
		$user = $this->return_user_2();
		$user->save();
	}

	private function insert_user_3() {
		$this->delete_editor_3();
		$user = $this->return_user_3();
		$user->save();
	}

	private function insert_editor_2() {
		$this->delete_editor_2();

		$this->insert_user_2();

		$editor = $this->return_editor_2();
		$editor->save();
	}

	private function insert_editor_3() {
		$this->delete_editor_3();

		$this->insert_user_3();

		$editor = $this->return_editor_3();
		$editor->save();
	}

	private function insert_editor_1() {
		$this->delete_editor_1();

		$this->insert_user_1();

		$editor = $this->return_editor_1();
		$editor->save();
	}

	private function delete_editor_1() {
		$old_editor = Editor::where('email', "fran_no_te_cortes@gmail.com")->first();
		if($old_editor != null) $old_editor->delete();
		$old_user = User::where('email', "fran_no_te_cortes@gmail.com")->first();
		if($old_user != null) $old_user->delete();
	}

	private function delete_editor_2() {
		$old_editor = Editor::where('email', "fran_te_has_cortado@gmail.com")->first();
		if($old_editor != null) $old_editor->delete();
		$old_user = User::where('email', "fran_te_has_cortado@gmail.com")->first();
		if($old_user != null) $old_user->delete();
	}

	private function delete_editor_3() {
		$old_editor = Editor::where('email', "francisco_del_espino@gmail.com")->first();
		if($old_editor != null) $old_editor->delete();
		$old_user = User::where('email', "francisco_del_espino@gmail.com")->first();
		if($old_user != null) $old_user->delete();
	}

	/**
	 * @test
	 */
	public function insert_editor_controller() {
		$this->insert_user_1();

		$editor = $this->return_editor_1();

		$editor_controller = new EditorController();
		$val = $editor_controller->insert_editor($editor);
		$this->assertTrue($val);

		$search_editor = Editor::where('email', 'fran_no_te_cortes@gmail.com')->first();
		$this->assertNotNull($search_editor);

		$this->assertEquals($editor->email, $search_editor->email);
		$this->assertEquals($editor->description, $search_editor->description);
		$this->assertEquals($editor->profile_image, $search_editor->profile_image);
		$this->assertEquals($editor->instagram, $search_editor->instagram);
		$this->assertEquals($editor->facebook, $search_editor->facebook);
		$this->assertEquals($editor->twitter, $search_editor->twitter);
		$this->assertEquals($editor->is_admin, $search_editor->is_admin);
		$this->assertEquals($editor->is_active, $search_editor->is_active);

		$this->delete_editor_1();
	}

	/**
	 * @test
	 */
	public function insert_editor_controller_empty() {
		$this->insert_user_1();
		$editor = new Editor();
		$editor_controller = new EditorController();
		$val = $editor_controller->insert_editor($editor);
		$this->assertFalse($val);
	}

	/**
	 * @test
	 */
	public function insert_user_editor_controller() {
		$this->delete_editor_1();
		$user = $this->return_user_1();
		$editor = $this->return_editor_1();
		$editor_controller = new EditorController();
		$val = $editor_controller->insert_user_editor($user, $editor);
		$this->assertTrue($val);

		$search_editor = Editor::where('email', 'fran_no_te_cortes@gmail.com')->first();
		$this->assertNotNull($search_editor);

		$this->assertEquals($editor->email, $search_editor->email);
		$this->assertEquals($editor->description, $search_editor->description);
		$this->assertEquals($editor->profile_image, $search_editor->profile_image);
		$this->assertEquals($editor->instagram, $search_editor->instagram);
		$this->assertEquals($editor->facebook, $search_editor->facebook);
		$this->assertEquals($editor->twitter, $search_editor->twitter);
		$this->assertEquals($editor->is_admin, $search_editor->is_admin);
		$this->assertEquals($editor->is_active, $search_editor->is_active);

		$search_user = User::where('email', 'fran_no_te_cortes@gmail.com')->first();
		$this->assertNotNull($search_user);

		$this->assertEquals($user->email, $search_user->email);
		$this->assertEquals($user->name, $search_user->name);
		$this->assertEquals($user->password, $search_user->password);

		$this->delete_editor_1();
	}

	/**
	 * @test
	 */
	public function insert_user_editor_controller_empty() {
		$user = new User();
		$editor = new Editor();
		$editor_controller = new EditorController();
		$val = $editor_controller->insert_user_editor($user, $editor);
		$this->assertFalse($val);
	}

	/**
	 * @test
	 */
	public function delete_editor_controller() {
		$this->insert_editor_1();
		$editor = $this->return_editor_1();
		$editor_controller = new EditorController();
		$val = $editor_controller->delete_editor($editor);
		$this->assertTrue($val);
		$this->assertNull(Editor::where('email', $editor->email)->first());
	}

	/**
	 * @test
	 */
	public function delete_editor_controller_empty() {
		$this->insert_editor_1();
		$editor = new Editor();
		$editor_controller = new EditorController();
		$val = $editor_controller->delete_editor($editor);
		$this->assertFalse($val);
		$this->assertNull(Editor::where('email', $editor->email)->first());
		$this->delete_editor_1();
	}

	/**
	 * @test
	 */
	public function delete_user_editor_controller() {
		$this->insert_editor_1();
		$editor = $this->return_editor_1();
		$editor_controller = new EditorController();
		$val = $editor_controller->delete_user_editor($editor);
		$this->assertTrue($val);
		$this->assertNull(Editor::where('email', $editor->email)->first());
		$this->assertNull(User::where('email', $editor->email)->first());
		$this->delete_editor_1();
	}

	/**
	 * @test
	 */
	public function delete_user_editor_controller_empty() {
		$editor = new Editor();
		$editor_controller = new EditorController();
		$val = $editor_controller->delete_user_editor($editor);
		$this->assertFalse($val);
	}

	/**
	 * @test
	 */
	public function modify_editor_controller() {
		$this->insert_editor_1();
		$editor = $this->return_editor_1();
		$editor->facebook = "Nuevo perfil 1";
		$editor->twitter = "Nuevo perfil 2";
		$editor->instagram = "Nuevo perfil 3";
		$editor_controller = new EditorController();
		$val = $editor_controller->modify_editor($editor);
		$search_editor = Editor::where('email', $editor->email)->first();
		$this->assertTrue($val);
		$this->assertNotNull($search_editor);
		$this->assertEquals($search_editor->instagram, $editor->instagram);
		$this->assertEquals($search_editor->twitter, $editor->twitter);
		$this->assertEquals($search_editor->facebook, $editor->facebook);
	}

	/**
	 * @test
	 */
	public function modify_editor_controller_empty() {
		$this->insert_editor_1();
		$editor = new Editor();
		$editor_controller = new EditorController();
		$val = $editor_controller->modify_editor($editor);
		$this->assertFalse($val);
	}


	private function save_values_in_arr($list) {
		$save = new SaveEditorValues();
		$save->save_emails($list);
		$save->save_descriptions($list);
		$save->save_images($list);
		$save->save_instagrams($list);
		$save->save_facebooks($list);
		$save->save_twitters($list);
		return $save;
	}

	/**
	 * @test
	 */
	public function list_editor_controller() {
		// Create 3 new users
		$this->insert_editor_1();
		$this->insert_editor_2();
		$this->insert_editor_3();	
		$editors_setup = array($this->return_editor_1(), 
			$this->return_editor_2(), 
			$this->return_editor_3());
		$editor_controller = new EditorController();
		$editors = $editor_controller->list_editors(null, "Fran");
		$save = $this->save_values_in_arr($editors);
		if(is_bool($editors)) $this->assertTrue(false); // Autofail
		else {
			$this->assertTrue(in_array($editors_setup[0]->email, $save->emails));
			$this->assertTrue(in_array($editors_setup[1]->email, $save->emails));
			$this->assertTrue(in_array($editors_setup[2]->email, $save->emails));
			$this->assertTrue(in_array($editors_setup[0]->description, $save->descriptions));
			$this->assertTrue(in_array($editors_setup[1]->description, $save->descriptions));
			$this->assertTrue(in_array($editors_setup[2]->description, $save->descriptions));
			$this->assertTrue(in_array($editors_setup[0]->instagram, $save->instagrams));
			$this->assertTrue(in_array($editors_setup[1]->instagram, $save->instagrams));
			$this->assertTrue(in_array($editors_setup[2]->instagram, $save->instagrams));
			$this->assertTrue(in_array($editors_setup[0]->twitter, $save->twitters));
			$this->assertTrue(in_array($editors_setup[1]->twitter, $save->twitters));
			$this->assertTrue(in_array($editors_setup[2]->twitter, $save->twitters));
			$this->assertTrue(in_array($editors_setup[0]->facebook, $save->facebooks));
			$this->assertTrue(in_array($editors_setup[1]->facebook, $save->facebooks));
			$this->assertTrue(in_array($editors_setup[2]->facebook, $save->facebooks));
			$this->assertTrue(in_array($editors_setup[0]->profile_image, $save->images));
			$this->assertTrue(in_array($editors_setup[1]->profile_image, $save->images));
			$this->assertTrue(in_array($editors_setup[2]->profile_image, $save->images));
		}
	}
}

class SaveEditorValues {
		public $emails;
		public $descriptions;
		public $images;
		public $instagrams;
		public $facebook;
		public $twitters;

		public function save_emails($list) {
			$this->emails = array();
			for($i=0; $i< $list->count(); $i++) {
				array_push($this->emails, $list[$i]->email);
			}
		}

		public function save_descriptions($list) {
			$this->descriptions = array();
			for($i=0; $i< $list->count(); $i++) {
				array_push($this->descriptions, $list[$i]->description);
			}
		}

		public function save_images($list) {
			$this->images = array();
			for($i=0; $i< $list->count(); $i++) {
				array_push($this->images, $list[$i]->profile_image);
			}
		}

		public function save_instagrams($list) {
			$this->instagrams = array();
			for($i=0; $i< $list->count(); $i++) {
				array_push($this->instagrams, $list[$i]->instagram);
			}
		}

		public function save_facebooks($list) {
			$this->facebooks = array();
			for($i=0; $i< $list->count(); $i++) {
				array_push($this->facebooks, $list[$i]->facebook);
			}
		}

		public function save_twitters($list) {
			$this->twitters = array();
			for($i=0; $i< $list->count(); $i++) {
				array_push($this->twitters, $list[$i]->twitter);
			}
		}
}


