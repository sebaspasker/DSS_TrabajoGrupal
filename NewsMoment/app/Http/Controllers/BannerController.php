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
			$banners=Banner::orderBy('id','ASC');
			return view('Banner.index',compact('banners'));
		}


		public function create()
		{
			return view('Banner.create');
		}


		public function store(Request $request)
		{
			$this->validate($request,['title'=>'required','url'=>'required','imagen'=>'required','company_name'=>'required','ranking_type'=>'required','is_active'= true]);
			$count =Banner::where('title',$request->title)->count();
			$count2 =Banner::where('company_name',$request->company_name)->count();
			if($count<=0)
			{
				return redirect()->route('banner.index')->withErrors('El título introducido ya existe en la BD');
			}
			else
			{
				if($banner2==0)
				{
					return redirect()->route('banner.index')->withErrors('La compañía introducida no existe');
				}
				else
				{
					Banner::create($request->all());
					return redirect()->route('banner.index')->with('success','Banner creado correctamente');
				}
			}
		}

	   
		public function show($id)
		{
			$banners=Banner::find($id);
			return view('banners.show',compact('banners'));
		}


		public function edit($id){
			$banners = banners::find($id);
			return view('banners.edit',compact('banners'));
		}



		public function update(Request $request, $id){
			$this->validate($request,['title'=>'required','url'=>'required','imagen'=>'required','company_name'=>'required','ranking_type'=>'required','is_active'= true]);
			
			$count =Banner::where('title',$request->title)->count();
			$count2 =Banner::where('company_name',$request->company_name)->count();
			if($count<=0)
			{
				return redirect()->route('banner.index')->withErrors('El título introducido ya existe en la BD');
			}
			else
			{
				if($count2==0)
				{
					return redirect()->route('banner.index')->withErrors('La compañía introducida no existe');
				}
				else
				{
					Banner::find($id)->update($request->all());
					return redirect()->route('banner.index')->with('success','Banner actualizado correctamente');
				}
		}

	   
		public function destroy($id)
		{
			Banner::find($id)->delete();
			return redirect()->route('banners.index')->with('success','Banner eliminado correctamente');
		}
}
