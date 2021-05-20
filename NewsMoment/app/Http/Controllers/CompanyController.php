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
        return view('company.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name'=>'required|unique|max:35',
                                    'image_url'=>'mimes:jpg,png']);
        $company = new Company();
        $company->name=$request->get('name');
        $company->is_active=true;
        $company->image_url=$request->get('image_url');

        $company->save();
        return redirect('/company');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company=Company::find($id);
        return view('company.index')->with('company', $company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company=Company::find($id);
        return view('company.edit')->with('companies', $company);
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
        $this->validate($request, ['name'=>'required|unique|max:35',
                                    'image_url'=>'mimes:jpg,png']);
        $company = Company::find($id);

        $company->name=$request->get('name');
        $company->image_url=$request->get('image_url');

        $company->save();
        return redirect('/company');
    }

    public function update_to_false($id)
    {
        $company = Company::find($id);

        $company->is_active=false;

        $company->save();
        return redirect('/company');
    }


    public function update_to_true($id)
    {
        $company = Company::find($id);

        $company->is_active=true;

        $company->save();
        return redirect('/company');
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
        
        return redirect('/company');
    }
}
