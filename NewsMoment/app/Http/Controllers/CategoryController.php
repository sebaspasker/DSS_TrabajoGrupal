<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index(){
        $categories = Category::all();

        $info = [
            'categories' => $categories,
		];

		return view('manager/categorias', $info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager/categoria_nueva');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name'=>'required|unique:categories|max:35',
                                    'imagen'=>'required|image']);
        $category = new Category();
        $category->name = $request->get('name');
        $category->slugname = $this->sanear_string($request->get('name'));
        $category->imagen= $request->file('imagen');
        $nombreimagen=time().".".$category->imagen->getClientOriginalExtension();
        $destino=public_path("static/img/categories/");
        $category->imagen->move($destino, $nombreimagen);
        $category->save();

        return redirect('/manager/categorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $category=Category::find($id);

        $info = [
            'category' => $category,
		];

        return view('manager/categoria')->with('categories', $info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $category = Category::find($id);

        $info = [
            'category' => $category,
		];

        return view('manager/categoria_editar')->with('categories', $info);
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
       $this->validate($request, ['name'=>'required|unique:categories|max:35',
                                   'imagen'=>'image']);
        $category = Category::find($id);
        $category->name = $request->get('name');
        $category->slugname = $this->sanear_string($request->get('name'));
        $category->imagen= $request->file('imagen');
        $nombreimagen=time().".".$category->imagen->getClientOriginalExtension();
        $destino=public_path("static/img/categories/");
        $category->imagen->move($destino, $nombreimagen);
        $category->save();
        return redirect('/manager/categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();

        return redirect('/manager/categorias');
    }
}
