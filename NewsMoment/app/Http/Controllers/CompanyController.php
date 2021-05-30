<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies=Company::all();

        $info = [
            'companies' => $companies,
		];

        return view('manager/companies',$info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager/company_nueva');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name'=>'required|max:35',
                                    'image_url'=>'required|image']);
        $company = new Company();
        $company->name=$request->get('name');
        $company->is_active=true;
        $company->image_url=$request->file('image_url');
        $nombreimagen=time().".".$company->image_url->getClientOriginalExtension();
        $destino=public_path("static/img/companies/");
        $company->image_url->move($destino, $nombreimagen);

        $company->save();
        return redirect('manager/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companies=Company::find($id);

        $info = [
            'companies' => $companies,
		];

        return view('manager/company')->with('companies', $info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies=Company::find($id);

        $info = [
            'companies' => $companies,
		];

        return view('manager/company_editar')->with('companies', $info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['name'=>'required|max:35',
                                    'image_url'=>'image']);
        $company = Company::find($id);

        $company->name=$request->get('name');
        $company->is_active=true;
        $company->image_url= $request->file('image_url');
        $nombreimagen=time().".".$company->image_url->getClientOriginalExtension();
        $destino=public_path("static/img/companies/");
        $company->image_url->move($destino, $nombreimagen);

        $company->save();
        return redirect('manager/companies');
    }

    public function update_to_false($id)
    {
        $company = Company::find($id);

        $company->is_active=false;

        $company->save();
        return redirect('manager/companies');
    }


    public function update_to_true($id)
    {
        $company = Company::find($id);

        $company->is_active=true;

        $company->save();
        return redirect('manager/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company=Company::find($id);
        $company->delete();

        return redirect('manager/companies');
    }
}
