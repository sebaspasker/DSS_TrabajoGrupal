<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
	public function show_companys() {
		$empresas = Company::orderBy('id', 'desc');
		return view('manager/empresas', ['empresas' => $empresas]);
	}

	public function store(Request $request) {
		$company = new Company();
		$company->name = $request->get('nombre');
		$company->image_url = $request->get('imagen');
		$company->is_active = true;
		if($company->name != "" && $company->image_url && !$company->exist()) {
			$company->save();        
			return redirect('/manager/empresas');
		} else {
			// TODO salta error
		}
	}
}
