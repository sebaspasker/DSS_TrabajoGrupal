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


		public function store(Request $request)
		{
			$this->validate($request,['title'=>'required|unique:banners','url'=>'required','image_url'=>'required','company_name'=>'required','ranking_type'=>'required']);
			
			$banners = new Banner();
			$banners->title = $request->get('title');
			$banners->url = $request->get('url');
			$banners->image_url = $request->file('image_url');
			$banners->company_name = $request->get('company_name');
			$banners->ranking_type = $request->get('ranking_type');
			$banners->is_active = true;
			
			
			//$nombreimagen=time().".".$banners->image_url->getClientOriginalExtension();
			//$destino=public_path("static/img/banners/");
			//$banners->image_url->move($destino, $nombreimagen);
			
			$count = Banner::where('title',$request->title)->count();
			$count2 = Banner::where('company_name',$request->company_name)->count();
			if($count<=0)
			{
				return redirect()->route('manager/banner_index')->withErrors('El título introducido ya existe en la BD');
			}
			else
			{
				if($count2==0)
				{
					return redirect()->route('manager/banner_index')->withErrors('La compañía introducida no existe');
				}
				else
				{
					$banners->save();
					return redirect()->route('manager/banner_index')->with('success','Banner creado correctamente');
				}
			}
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
			$this->validate($request,['title'=>'required|unique:banners','url'=>'required','image_url'=>'required','company_name'=>'required','ranking_type'=>'required']);
			
			$banners = Banner::find($id);
			$banners->title = $request->get('title');
			$banners->url = $request->get('url');
			$banners->image_url = $request->file('image_url');
			$banners->company_name = $request->get('company_name');
			$banners->ranking_type = $request->get('ranking_type');
			$banners->is_active = true;
			
			
			//$nombreimagen=time().".".$banners->image_url->getClientOriginalExtension();
			//$destino=public_path("static/img/banners/");
			//$banners->image_url->move($destino, $nombreimagen);
			
			$count = Banner::where('title',$request->title)->count();
			$count2 = Banner::where('company_name',$request->company_name)->count();
			if($count<=0)
			{
				return redirect()->route('manager/banner_index')->withErrors('El título introducido ya existe en la BD');
			}
			else
			{
				if($count2==0)
				{
					return redirect()->route('manager/banner_index')->withErrors('La compañía introducida no existe');
				}
				else
				{
					$banners->save();
					return redirect()->route('manager/banner_index')->with('success','Banner creado correctamente');
				}
		}
	}
	   
		/**
		public function destroy($id)
		{
			$banners = Banner::find($id);
			$banners->delete();
			return redirect('manager/banner_index')->with('success','Banner eliminado correctamente');
		}**/
}
