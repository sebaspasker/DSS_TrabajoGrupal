<?php

namespace Tests\Unit;

use Tests\TestCase; 
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Editor;
use App\User;
;
// TODO

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
}
