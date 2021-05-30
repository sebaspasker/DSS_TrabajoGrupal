<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Category;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

		public function get_login() {
			// Verify user not authenticated 
			/* if(Auth::check()) { */
			/* 	return Redirect::to('manager_publicaciones'); */
			/* } */

			$categorias = Category::all();
			$info = [
				"categorias" => $categorias,
			];

			return view('public/login', $info);
		}

		public function post_login(Request $request) {
			/* return redirect()->intended('manager_publicaciones'); */
			return view('manager_publicaciones'); 
			/* $request->([ */
			/* 	'email' => 'required|max:100', */
			/* 	'password' => 'required', */
			/* ]); */

			/* $credentials = $request->only('email', 'password'); */

			/* if(Auth::attempt($credentials)) { */
			/* 	$request->session()->regenerate(); */
				
			/* 	return redirect()->intended('manager_publicaciones'); */
			/* } */

			/* return back()->withErrors([ */
			/* 	'email' => 'Credenciales incorrectas', */
			/* ]); */
		}

		public function post_logout() {
			// TODO
		}

		public function get_register() {
			// TODO
		}

		public function post_register() {
			// TODO
		}
}
