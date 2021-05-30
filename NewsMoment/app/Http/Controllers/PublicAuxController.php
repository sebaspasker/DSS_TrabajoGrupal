<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use App\Category;
use App\Banner;
use Exception;


class PublicAuxController extends Controller{

	public function home() {
		$publications = Publication::orderBy('id', 'desc')->limit(3)->get();
		$banner = Banner::where('ranking_type', 2)->take(1)->get();

		$info = [
			'publication1' => $publications[0],
			'publication2' => $publications[1],
			'publication3' => $publications[2],
			'categorias' => Category::all(),
			'banner' => $banner[0],
		];

		return view('public/home', $info);
	}






	public function buscar(Request $request) {
		$query = $request->get('q');

		$info = [
			'publications' => Publication::orWhere('title', 'LIKE', "%$query%")->orWhere('subtitle', 'LIKE', "%$query%")->orWhere('body', 'LIKE', "%$query%")->paginate(3),
			'query' => $query,
			'categorias' => Category::all(),
		];

		return view('public/buscar', $info);
	}



	public function contacto() {
		$info = [
			'categorias' => Category::all(),
		];

		return view('public/contacto', $info);
	}

	public function informacion() {
		$info = [
			'categorias' => Category::all(),
		];

		return view('public/informacion', $info);
	}



	public function categoria($id) {
		$categoria = Category::find($id);
		$publicaciones = Publication::Where('category', '=', $categoria->name)->paginate(3);
		$info = [
			'categoria' => $categoria,
			'publications' => $publicaciones,
			'categorias' => Category::all(),
		];

		return view('public/categoria', $info);
	}

}