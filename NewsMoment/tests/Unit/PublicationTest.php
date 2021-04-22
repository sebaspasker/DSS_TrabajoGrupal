<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase; 
use App\Publication;
use App\Editor;
use App\Category;
use App\User;
use App\Http\Controllers\PublicationController;

class PublicationTest extends TestCase
{
	public function setUp() : void {
		parent::setUp();

			$publication_exist = Publication::where('editor_email', 'user_publication@gmail.com')->first();
			if($publication_exist != null) {
				$publication_exist->delete();
			}

			$editor_exist = Editor::where('email', 'user_publication@gmail.com')->first();
			if($editor_exist != null) {
				$editor_exist->delete();
			}

			$user_exist = User::where('name', 'User_Publication')->first();
			if($user_exist != null) {
				$user_exist->delete();
			}

			$user = new User();
			$user->name = "User_Publication";
			$user->password = "User_Publication123";
			$user->email = "user_publication@gmail.com";
			$user->save();

			$editor = new Editor();
			$editor->email = 'user_publication@gmail.com';
			$editor->description = "Editor description";
			$editor->profile_image = "";
			$editor->facebook = "";
			$editor->instagram = "";
			$editor->twitter = "";
			$editor->is_admin = false;
			$editor->is_active = false;
			$editor->save();


	}

	/**
	/**
	 * @test
	 *
	public function correct_publication_save()
	{
		$publication = new Publication();
		$publication->slugname = "publication_1";
		$publication->title = "title1";
		$publication->subtitle = "subtitle1";
		$publication->source = "source1";
		$publication->image_url = "image_url1";
		$publication->video_url = "video_url1";
		$publication->category = "category_1";
		$publication->active = false;
		$publication->has_video = false;
		$publication->views_counter = 0;
		$publication->editor_email = "user_publication@gmail.com";
		$publication->save();

		$publication_where = Publication::where('editor_email', 'user_publication@gmail.com')->first();
		$this->assertEquals($publication_where->slugname, $publication->slugname);
		$this->assertEquals($publication_where->title, $publication->title);
		$this->assertEquals($publication_where->subtitle, $publication->subtitle);
		$this->assertEquals($publication_where->source, $publication->source);
		$this->assertEquals($publication_where->image_url, $publication->image_url);
		$this->assertEquals($publication_where->video_url, $publication->video_url);
		$this->assertEquals($publication_where->category, $publication->category);
		$this->assertEquals($publication_where->active, $publication->active);
		$this->assertEquals($publication_where->has_video, $publication->has_video);
		$this->assertEquals($publication_where->views_counter, $publication->views_counter);
		$this->assertEquals($publication_where->editor_email, $publication->editor_email);
		$publication->delete();
	}*/

	private function return_category_1() : Category {
		$category = new Category();
		$category->name = "Política";
		$category->slugname = "politica";
		$category->imagen = "imagen1";
		return $category;
	}

	private function return_publication_1() : Publication {
		$publication = new Publication();
		$publication->title = "title1";
		$publication->slugname = "slugname1";
		$publication->editor_email = "fran_no_te_cortes@gmail.com";
		$publication->category = "Política";
		$publication->subtitle = "subtitle1";
		$publication->source = "source1";
		$publication->image_url = "image_url1";
		$publication->video_url = "video_url1";
		$publication->active = true;
		$publication->has_video = true;
		$publication->views_counter = 0;

		return $publication;
	}

	private function return_user_1() : User {
		$user = new User();
		$user->name = "Francisco de la Corte";
		$user->email = "fran_no_te_cortes@gmail.com";
		$user->password = "francito_me_llaman";
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

	private function delete_values() {
		$publication = Publication::where('title', $this->return_publication_1()->title)->first();
		$editor = Editor::where('email', $this->return_editor_1()->email)->first();
		$user = User::where('email', $this->return_user_1()->email)->first();
		$category = Category::where('name', $this->return_category_1()->name)->first();
		if($publication != null )$publication->delete();
		if($editor != null )$editor->delete();
		if($user != null )$user->delete();
		if($category != null )$category->delete();
	}

	private function insert_values() {
		$editor = $this->return_editor_1();
		$user = $this->return_user_1();
		$category = $this->return_category_1();
		$user->save();
		$editor->save();
		$category->save();
	}

	/**
	 * @test
	 */
	public function insert_publication_controller() {
		$this->delete_values();
		$this->insert_values();
		$publication = $this->return_publication_1();
		$publication_controller = new PublicationController();
		$val = $publication_controller->insert_publication($publication);
		$search_publication = Publication::where('title', $publication->title)->first();
		$this->assertNotNull($search_publication);
		$this->assertTrue($val);
		$this->assertEquals($publication->title, $search_publication->title);
		$this->assertEquals($publication->editor_email, $search_publication->editor_email);
		$this->assertEquals($publication->category, $search_publication->category);
	}

	/**
	 * @test
	 */
	public function delete_publication_controller() {
		$this->delete_values();
		$this->insert_values();
		$publication = $this->return_publication_1();
		$publication->save();
		$publication_controller = new PublicationController();
		$val = $publication_controller->delete_publication($publication);
		$search_publication = Publication::where('title', $publication->title)->first();
		$this->assertNull($search_publication);
		$this->assertTrue($val);
	}

	/**
	 * @test
	 */
	public function modify_publication_controller() {
		$this->delete_values();
		$this->insert_values();
		$publication = $this->return_publication_1();
		$publication->save();
		$publication->active = true;
		$publication->source = "source/dir";
		$publication->image_url = "image/dir";
		$publication->video_url = "video/dir";
		$publication_controller = new PublicationController();
		$val = $publication_controller->modify_publication($publication);
		$this->assertTrue($val);
		$search_publication = Publication::where('title', $publication->title)->first();
		$this->assertNotNull($search_publication);
		$this->assertEquals($publication->source, $search_publication->source);
		$this->assertEquals($publication->image_url, $search_publication->image_url);
		$this->assertEquals($publication->video_url, $search_publication->video_url);
	}

}

