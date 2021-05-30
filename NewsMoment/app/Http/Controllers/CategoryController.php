<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Publication;
use DB;


class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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
        $this->validate($request, ['name'=>'required|unique:categories,name|max:35',
                                    'imagen'=>'image|nullable']);
        $category = new Category();
        $category->name = $request->get('name');
        $category->slugname = $this->sanear_string($request->get('name'));
        if($request->file('imagen')!=NULL)
        {
            $category->imagen= $request->file('imagen');
            $nombreimagen=time().".".$category->imagen->getClientOriginalExtension();
            $destino=public_path("static/img/categories/");
            $category->imagen->move($destino, $nombreimagen);
            $category->imagen = "/static/img/categories/" . $nombreimagen;
        }
        else
            $category->imagen = "";
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

        return view('manager/categoria_editar',$info);
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
                                   'imagen'=>'image|nullable']);
        $category = Category::find($id);
        $category->name = $request->get('name');
        $category->slugname = $this->sanear_string($request->get('name'));
        if($request->file('imagen')!=NULL)
        {
            $category->imagen= $request->file('imagen');
            $nombreimagen=time().".".$category->imagen->getClientOriginalExtension();
            $destino=public_path("static/img/categories/");
            $category->imagen->move($destino, $nombreimagen);
            $category->image_url= "/static/img/categories/" . $nombreimagen;
        }

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
        DB::transaction(function() use ($id)
        {
            $category=Category::find($id);
            $publications=Publication::where('category', '$category->name');
            $publications->delete();
            $category->delete();
        });
        return redirect('/manager/categorias');
    }
}
