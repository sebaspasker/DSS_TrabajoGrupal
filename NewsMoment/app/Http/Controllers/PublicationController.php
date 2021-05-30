<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use App\Company;
use App\Category;
use App\Banner;
use App\Editor;

class PublicationController extends Controller
{
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
    public function create()
    {
        return view('manager/publicacion_nueva');
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
                                    'video_url'=>'mimes:mp4,avi|nullable',
                                    'category'=>'required|exists:categories,name',
                                    'editor_email'=>'required|email|exists:editors,email']);
        $publication = new Publication();
        $publication->slugname=$this->sanear_string($request->get('title'));
        $publication->title=$request->get('title');
        $publication->subtitle=$request->get('subtitle');
        $publication->source=$request->get('source');
        $publication->category=$request->get('category');
        $publication->editor_email=$request->get('editor_email');

        if($request->file('image_url')!=NULL)
        {
            $publication->image_url= $request->file('image_url');
            $nombreimagen=time().".".$publication->image_url->getClientOriginalExtension();
            $destino=public_path("static/img/publication/");
            $publication->image_url->move($destino, $nombreimagen);
        }
        else
            $publication->image_url= "";

        if($request->file('video_url')!=NULL)
        {
            $publication->video_url= $request->file('video_url');
            $nombrevideo=time().".".$publication->video_url->getClientOriginalExtension();
            $destino=public_path("static/img/publication/");
            $publication->video_url->move($destino, $nombrevideo);
            $publication->has_video=true;
        }
        else
        {
            $publication->video_url= "";
            $publication->has_video=false;
        }
        
        $publication->body=$request->get('body');
        $publication->active=true;
        $publication->views_counter=0;

        $publication->save();
        return redirect('/manager/publicaciones');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publications=Publication::find($id);
        $publications->views_counter+=1;
        $publications->save();

        $info = [
            'publications' => $publications,
		];

        return view('manager/publicacion')->with('publications', $info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publications=Publication::find($id);

        $info = [
            'publications' => $publications,
		];

        return view('manager/publicacion_editar')->with('publications', $info);
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
        $this->validate($request, ['title'=>'required|unique:publications,title|max:35',
                                    'subtitle'=>'required|max:50',
                                    'source'=>'required|max:100',
                                    'body'=>'required|max:255',
                                    'image_url'=>'image|nullable',
                                    'video_url'=>'mimes:mp4,avi|nullable',
                                    'category'=>'required|exists:categories,name',
                                    'editor_email'=>'required|email|exists:editors,email']);
        $publication=Publication::find($id);
        $publication->slugname=$this->sanear_string($request->get('title'));
        $publication->title=$request->get('title');
        $publication->subtitle=$request->get('subtitle');
        $publication->source=$request->get('source');
        $publication->category=$request->get('category');
        $publication->editor_email=$request->get('editor_email');

        if($request->file('image_url')!=NULL)
        {
            $publication->image_url= $request->file('image_url');
            $nombreimagen=time().".".$publication->image_url->getClientOriginalExtension();
            $destino=public_path("static/img/publication/");
            $publication->image_url->move($destino, $nombreimagen);
        }
        else
            $publication->image_url= "";

        if($request->file('video_url')!=NULL)
        {
            $publication->video_url= $request->file('video_url');
            $nombrevideo=time().".".$publication->video_url->getClientOriginalExtension();
            $destino=public_path("static/img/publication/");
            $publication->video_url->move($destino, $nombrevideo);
            $publication->has_video=true;
        }
        else
        {
            $publication->video_url= "";
            $publication->has_video=false;
        }
        $publication->body=$request->get('body');

        $publication->save();
        return redirect('/manager/publicaciones');
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
    public function destroy($id)
    {
        $publication=Publication::find($id);
        $publication->delete();
        
        return redirect('/manager/publicaciones');
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



	public function ultimos()
    {
		$publications = Publication::where('active', 'true')->orderBy('id', 'desc')->paginate(3);
		return view('public/ultimos', ['publications' => $publications]);
	}


	public function buscar(Request $request)
    {
		$query = $request->get('q');

		$info = [
			'publications' => Publication::orWhere('title', 'LIKE', "%$query%")->orWhere('subtitle', 'LIKE', "%$query%")->orWhere('body', 'LIKE', "%$query%")->paginate(3),
			'query' => $query,
		];

		return view('public/buscar', $info);
	}
}
