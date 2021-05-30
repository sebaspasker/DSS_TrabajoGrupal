<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Editor;

class EditorController extends Controller
{
	public function index() {
		$editors = Editor::all();

		$info = [
			'editors' => $editors,
		];

		// TODO create editors listing blade 
		return view('manager/editors', $info);
	}

	// TODO probe
	public function store(Request $request) {
		$this->validate($request, ['email' => 'required',
			'profile_image' => 'required']);
		$editor = new Editor();
		$editor->email = $request->get('email');
		$editor->description = $request->get('description');
		$editor->profile_image = $request->get('profile_image');
		$editor->facebook = $request->get('facebook');
		$editor->instagram = $request->get('instagram');
		$editor->twitter = $request->get('twitter');
		$editor->is_admin = false;
		$editor->is_active= false;
		$editor->save();

		// TODO no editor creation in page
		return redirect('manager/publications');
	}

	public function destroy($id) {
		$editor = Editor::find($id);
		$editor->delete();
		// TODO no editor destruction in page
		return redirect('manager/companies');
	}

	public function edit($id) {
		$editors = Editor::find($id);

		$info = [
			'editors' => $editors,
		];

		return view('manager/editor_editar')->with('editors', $info);
	}

	/* public function update(Request $request, $id) { */
	/* 	$this->validate($request, ['email'=>'required']); */

	/* 	$editor = Editor::find($id); */
	/* 	$editor->email = $request->get('e'); */
	/* } */

	public function active_to_true($id) {
		$editor = Editor::find($id);
		$editor->is_active = true;
		$editor->save();
		// TODO change to related config editor
		return redirect('manager/publications');
	}

	public function active_to_false($id) {
		$editor = Editor::find($id);
		$editor->is_active = false;
		$editor->save();
		// TODO change to related config editor
		return redirect('manager/publications');
	}

	public function admin_to_true($id) {
		$editor = Editor::find($id);
		$editor->is_admin = true;
		$editor->save();
		// TODO change to related config editor
		return redirect('manager/publications');
	}

	public function admin_to_false($id) {
		$editor = Editor::find($id);
		$editor->is_admin = false;
		$editor->save();
		// TODO change to related config editor
		return redirect('manager/publications');
	}

}
