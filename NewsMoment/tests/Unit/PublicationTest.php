<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase; 
use App\Publication;
use App\Editor;
use App\User;

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
	 * @test
	 */
	public function correct_publication_save()
	{
		$publication = new Publication();
		$publication->slugname = "publication_1";
		$publication->title = "title1";
		$publication->subtitle = "subtitle1";
		$publication->source = "source1";
		$publication->image_url = "image_url1";
		$publication->video_url = "video_url1";
		$publication->category = "category1";
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
	}
}
