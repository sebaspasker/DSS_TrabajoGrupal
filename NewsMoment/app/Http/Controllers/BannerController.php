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
		return view('manager/banner_nuevo', ['empresas' => Company::all()]);
	}


	public function store(Request $request){
		$this->validate($request,['title'=>'required|unique:banners|max:50',
								'url'=>'required',
								'image_url'=> 'image|nullable',
								'company_name'=>'required',
								'ranking_type'=>'required']);

		$banners = new Banner();
		$banners->title = $request->get('title');
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

            $banners->image_url= "/static/img/banner/" . $nombreimagen;
		}
		else
		{
			$banners->image_url = "";
		}

		$banners->save();

		return redirect('/manager/banners');

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

		$banner = Banner::find($id);

		$info = [
			'banner' => $banner,
			'empresas' => Company::all(),
		];

		return view('manager/banner_edit', $info);
	}


	public function update(Request $request, $id){

		$this->validate($request,['title'=>'required|unique:banners|max:50',
								'url'=>'required',
								'image_url'=> 'image|nullable',
								'company_name'=>'required',
								'ranking_type'=>'required']);

		$banners = Banner::find($id);
		$banners->title = $request->get('title');
		$banners->url = $request->get('url');
		$banners->company_name = $request->get('company_name');
		$banners->ranking_type = $request->get('ranking_type');
		$banners->is_active = true;
		$banners->views_counter = 0; 

		if($request->file('image_url') != NULL){
			$banners->image_url = $request->file('image_url');
			$nombreimagen=time().".".$banners->image_url->getClientOriginalExtension();
			$destino=public_path("static/img/banner/");
			$banners->image_url->move($destino, $nombreimagen);

            $banners->image_url= "/static/img/banner/" . $nombreimagen;
		}

		$banners->save();

		return redirect('/manager/banners');
	}

	public function destroy($id){
		$banners = Banner::find($id);
		$banners->delete();
		return redirect('manager/banners');
	}
}
