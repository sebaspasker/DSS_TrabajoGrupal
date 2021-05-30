<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Banner;
use Exception;

class BannerController extends Controller
{
	public function index()
	{
		$banners = Banner::all();

		$info = [
		'banners' => $banners,
		];

		return view('manager/banner_index',$info);
	}


	public function create()
	{
		return view('manager/banner_nuevo');
	}

	function sanear_string($string){
		$string = trim($string);
		$string = str_replace(
			array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
			array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
			$string
		);
		$string = str_replace(
			array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
			array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
			$string
		);
		$string = str_replace(
			array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
			array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
			$string
		);
		$string = str_replace(
			array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
			array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
			$string
		);
		$string = str_replace(
			array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
			array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
			$string
		);
		$string = str_replace(
			array('ñ', 'Ñ', 'ç', 'Ç'),
			array('n', 'N', 'c', 'C',),
			$string
		);
		return $string;
	}

	public function store(Request $request)
	{
		$this->validate($request,['title'=>'required|unique:banners|max:50',
								'url'=>'required',
								'image_url'=> 'image_url|nullable',
								'company_name'=>'required',
								'ranking_type'=>'required']);

		$banners = new Banner();
		$banners->title = $this->sanearstring($request->get('title'));
		$banners->url = $request->get('url');
		$banners->company_name = $request->get('company_name');
		$banners->ranking_type = $request->get('ranking_type');
		$banners->is_active = true;
		$banners->views_counter = 0;

		if($request->file('image_url') != NULL)
		{
			$banners->image_url = $request->file('image_url');
			$nombreimagen=time().".".$banners->image_url->getClientOriginalExtension();
			$destino=public_path("static/img/banner/");
			$banners->image_url->move($destino, $nombreimagen);
		}
		else
		{
			$banners->image_url = "";
		}

		$banners->save();

		return redirect('/manager/banner_index');

	}


	public function show($id)
	{
		$banners = Banner::find($id);

		$info = [
		'banners' => $banners,
		];

		return view('manager/banner_show')->with('banners',$info);
	}


	public function edit($id){

		$banners = Banner::find($id);

		$info = [
		'banners' => $banners,
		];

		return view('manager/banners_edit')->with('banners',$info);
	}


	public function update(Request $request, $id){

		$this->validate($request,['title'=>'required|unique:banners|max:50',
								'url'=>'required',
								'image_url'=> 'image_url|nullable',
								'company_name'=>'required',
								'ranking_type'=>'required']);

		$banners = new Banner();
		$banners->title = $this->sanearstring($request->get('title'));
		$banners->url = $request->get('url');
		$banners->company_name = $request->get('company_name');
		$banners->ranking_type = $request->get('ranking_type');
		$banners->is_active = true;
		$banners->views_counter = 0;

		if($request->file('image_url') != NULL)
		{
			$banners->image_url = $request->file('image_url');
			$nombreimagen=time().".".$banners->image_url->getClientOriginalExtension();
			$destino=public_path("static/img/banner/");
			$banners->image_url->move($destino, $nombreimagen);
		}
		else
		{
			$banners->image_url = "";
		}

		$banners->save();

		return redirect('/manager/banner_index');

	public function destroy($id)
	{
		$banners = Banner::find($id);
		$banners->delete();
		return redirect('manager/banner_index');
	}
}
