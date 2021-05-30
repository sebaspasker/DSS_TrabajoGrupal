<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use App\Company;
use App\Category;
use App\Banner;
use App\Editor;
use Auth;

class PublicationController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth');
    }

	/**
	 * @var Publication Model
	 */
	public $publication;


	/**
	 * @var Category Model
	 */

	public $category;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications=Publication::where('active', '1')->get();

        $info = [
            'publications' => $publications,
		];

        return view('manager/publicaciones', $info);
    }

    public function publications_category($category)
    {
        $publications=Publication::where('category', '$category')->where('active','1')->get();

        $info = [
            'publications' => $publications,
		];

        return view('manager/publicaciones_categoria', $info);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('manager/publicacion_nueva', ['categorias' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title'=>'required|unique:publications,title|max:35',
                                    'subtitle'=>'required|max:50',
                                    'source'=>'required|max:100',
                                    'body'=>'required|max:255',
                                    'image_url'=>'image|nullable',
                                    'video_url'=>'max:50',
                                    'category'=>'required|exists:categories,name',
                                    'has_video'=> 'required'
                                    ]);
        $publication = new Publication();
        $publication->slugname=$this->sanear_string($request->get('title'));
        $publication->title=$request->get('title');
        $publication->subtitle=$request->get('subtitle');
        $publication->source=$request->get('source');
        $publication->category=$request->get('category');
        $publication->editor_email = Auth::user()->email;
        if($request->get('has_video') == true){
            $publication->has_video= 1;
        }
        else{
            $publication->has_video= 0;
        }
        

        if($request->file('image_url')!=NULL)
        {
            $publication->image_url= $request->file('image_url');
            $nombreimagen=time().".".$publication->image_url->getClientOriginalExtension();
            $destino=public_path("static/img/publication/");
            $publication->image_url->move($destino, $nombreimagen);
            $publication->image_url= "/static/img/publication/" . $nombreimagen;
        }
        else
            $publication->image_url= "";

        if($request->get('video_url')!=NULL){
            $publication->video_url= $request->get('video_url');
        }
        else{
            $publication->video_url= "";
        }

        $publication->body=$request->get('body');
        $publication->active=true;
        $publication->views_counter=0;

        $publication->save();
        return redirect('/manager');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){


        $publication = Publication::find($id);
        $publication->views_counter+=1;
        $publication->save();
		$banner = Banner::where('ranking_type', 1)->take(2)->get();
		$categoria = Category::where('name', $publication->category)->take(1)->get();

		$info = [
			'publication' => $publication,
			'banner1' => $banner[0],
			'banner2' => $banner[1],
			'categoria' => $categoria[0],
			'categorias' => Category::all(),
		];

		return view('public/publicacion', $info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $publication=Publication::find($id);

        $info = [
            'categorias' => Category::all(),
            'publication' => $publication,
		];
        return view('manager/publicacion_editar', $info);
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
        $this->validate($request, ['title'=>'required|titlemax:35',
                                    'subtitle'=>'required|max:50',
                                    'source'=>'required|max:100',
                                    'body'=>'required|max:255',
                                    'image_url'=>'image|nullable',
                                    'video_url'=>'max:50',
                                    'category'=>'required|exists:categories,name',
                                    'has_video'=> 'required',
                                    //'editor_email'=>'required|email|exists:editors,email'
                                    ]);
        $publication=Publication::find($id);
        $publication->slugname=$this->sanear_string($request->get('title'));
        $publication->title=$request->get('title');
        $publication->subtitle=$request->get('subtitle');
        $publication->source=$request->get('source');
        $publication->category=$request->get('category');
         if($request->get('has_video') == true){
            $publication->has_video= 1;
        }
        else{
            $publication->has_video= 0;
        }
        
        if($request->file('image_url')!=NULL){
            $publication->image_url= $request->file('image_url');
            $nombreimagen=time().".".$publication->image_url->getClientOriginalExtension();
            $destino=public_path("static/img/publication/");
            $publication->image_url->move($destino, $nombreimagen);
            $publication->image_url= "/static/img/publication/" . $nombreimagen;
        }

        if($request->get('video_url')!=NULL){
            $publication->video_url= $request->get('video_url');
        }

        $publication->body=$request->get('body');

        $publication->save();

        return redirect('/manager');
    }


    public function update_to_false($id)
    {
        $publication = Publication::find($id);

        $publication->active=false;

        $publication->save();
        return redirect('/manager/publicaciones');
    }


    public function update_to_true($id)
    {
        $publication = Publication::find($id);

        $publication->active=true;

        $publication->save();
        return redirect('/manager/publicaciones');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $publication=Publication::find($id);
        $publication->delete();

        return redirect('/manager');
    }

    public function home()
    {
		$publications = Publication::orderBy('id', 'desc')->limit(3)->get();
		$banner = Banner::where('ranking_type', 2)->take(1)->get();

		$info = [
			'publication1' => $publications[0],
			'publication2' => $publications[1],
			'publication3' => $publications[2],
			'banner' => $banner[0],
		];

		return view('public/home', $info);
	}


	/** Insert a publication
	 * @val in_publication Publication model
	 * @return bool
	 */
	public function insert_publication($in_publication = null) {
		if($in_publication != null) $this->publication = $in_publication;

		try {
			if(empty($this->publication->category)) throw new Exception("Category name can't be empty");
			if(empty($this->publication->title)) throw new Exception("Title can't be empty");
			// Insert publication
			$this->publication->save();
		} catch(exception $e) {
			return false;
		}

		return true;
	}

	/**
	 * Delete a publication
	 * @val in_publication Publication model
	 * @return bool
	 */
	public function delete_publication($in_publication = null) {
			if($in_publication != null) $title = $in_publication->title;
			else $title = $this->publication->title;

		try {
			$old_publication = Publication::where('title', $title)->first();
			if($old_publication == null) throw new Exception("None publication to delete");
			else $old_publication->delete(); // Delete publication
		} catch (Exception $e) {
			return false;
		}

	return true;

	}

	/**
	 * Modify a publication
	 * @val in_publication Publication Model
	 * @return bool
	 */
	public function modify_publication($in_publication = null) {
		if($in_publication != null) $this->publication = $in_publication;

		try {
			// Search publication in database
			$old_publication = Publication::where('title', $this->publication->title)->first();
			if($old_publication == null) throw new Exception("None publication to modify");
			else {
				// Modify values
				if($old_publication->slugname != $this->publication->slugname)
					$old_publication->slugname = $this->publication->slugname;

				if($old_publication->views_counter != $this->publication->views_counter)
					$old_publication->views_counter = $this->publication->views_counter;

				if($old_publication->active != $this->publication->active)
					$old_publication->active = $this->publication->active;

				if($old_publication->has_video != $this->publication->has_video)
					$old_publication->has_video = $this->publication->has_video;

				if($old_publication->image_url != $this->publication->image_url)
					$old_publication->image_url = $this->publication->image_url;

				if($old_publication->video_url != $this->publication->video_url)
					$old_publication->video_url = $this->publication->video_url;


				if($old_publication->source != $this->publication->source)
					$old_publication->source = $this->publication->source;

				if($old_publication->subtitle != $this->publication->subtitle)
					$old_publication->subtitle = $this->publication->subtitle;

				$old_publication->save(); // Save values in publication
			}
		} catch (Exception $e) {
			return false;
		}

		return true;
	}

	/**
	 * List publications search
	 * @val in_publication Publication Model
	 * @val category_name
	 * @return bool or array
	 */
	public function list_publications($in_publication = null, $category_name = "") {
		if($category_name == "") {
			if($in_publication != null) $category_name = $in_publication->category_name;
			else $category_name = $this->publication->category_name;
		}

		$publications = false;
		try {
			// Search publications
			$publications = Publication::where('category_name', 'LIKE', "%$category_name%")->get();
			if($publications == null) return false;
		} catch(exception $e) {
			return false;
		}
		return $publications;
	}

	/**
	 * Get x last publications id
	 * @val number
	 */
	public function get_last_publications($category_name = null, $number = 0) {
		if($category_name == null) $publications = Publication::all();
		else $publications = Publication::where('category', $category_name)->get();
		$total = $publications->count();
		array_reverse($publications->toArray());
		$x_publication = array();
		for($i=0; $i< $number; $i++) {
			array_push($x_publication, $publications[$i]);
		}

		return $x_publication;
	}
}
