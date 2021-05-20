<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Editor;

class EditorController extends Controller
{
	public function validateEditor(Request $request) {
		$request->validate([
			'nombre' => 'required|max:100',
			'password' => 'required',
		]);

		if(User::where('name', '=', $request->get('nombre'))->exists()) {
			$user_editor = User::where('name', '=', $request->get('nombre'))->first();
			if(Editor::where('email', '=', $user_editor->email)->exists()) {
				// TODO
				// Guardamos valores y validamos como correcto
			} else {
				// TODO
				// El usuario no es un editor por lo que es incorrecto
				// Redireccionamos con error o a la página de usuario simple
			}
		} else {
			// TODO 
			// El usuario no existe
			// Redireccionamos con error
		}

	}
}
