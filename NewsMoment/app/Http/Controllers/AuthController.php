<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AuthController extends Controller
{


    public function edit(){
        return view('manager/editar_perfil');
    }


   public function update(Request $request)
    {
        $this->validate($request, ['name'=>'required|max:35',
                                    'email'=>'email|required']);
        $user = User::find(Auth::user()->id);

        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->save();
        return redirect('manager/');
    }



}



