<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use App\Category;


class PublicationManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			// TODO hacer para cada artista
			// Esto seria para admin
        $publicationes = Publication::all();

				$info = [
					'publicaciones' => $publicationes,
				];

        return view('manager/publicaciones', $info);
    }

		public function get_new() {
			$categorias = Category::all();

			$info = [
				"categorias" => $categorias,
			];

			return view('manager/nueva_publicacion', $info);
		}

		public function post_new(Request $request) {
			//TODO			
		}
}
