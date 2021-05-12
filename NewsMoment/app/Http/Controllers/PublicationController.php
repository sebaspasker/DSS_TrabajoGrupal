<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Category;
use App\Banner;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications=Publication::where('active', 'true')->get();
        return view('publication.index')->with('publication', $publications);
    }

    public function publications_category($category)
    {
        $publications=Publication::where('category', '$category')->get();
        return view('publication.index')->with('publication', $publications);
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
        return view('publication.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $publication = new Publication();
        $publication->slugname=sanearstring($request->get('title'));
        $publication->title=$request->get('title');
        $publication->subtitle=$request->get('subtitle');
        $publication->source=$request->get('source');
        $publication->image_url=$request->get('image_url');
        $publication->video_url=$request->get('video_url');
        $publication->body=$request->get('body');
        $publication->category=$request->get('category');
        $publication->active=true;
        if($request->get('subtitle')!=NULL)
            $publication->has_video=true;
        else
            $publication->has_video=false;
        $publication->views_counter=0;

        $publication->save();
        return redirect('/publication');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publication=Publication::find($id);
        return view('publication.index')->with('publication', $publication);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publication=Publication::find($id);
        return view('publication.edit')->with('publications', $publication);
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
        $publication=Publication::find($id);
        $publication->slugname=sanearstring($request->get('title'));
        $publication->title=$request->get('title');
        $publication->subtitle=$request->get('subtitle');
        $publication->source=$request->get('source');
        $publication->image_url=$request->get('image_url');
        $publication->video_url=$request->get('video_url');
        $publication->body=$request->get('body');
        $publication->category=$request->get('category');
        if($request->get('subtitle')!=NULL)
            $publication->has_video=true;
        else
            $publication->has_video=false;

        $publication->save();
        return redirect('/publication');
    }


    public function update_to_false($id)
    {
        $publication = Publication::find($id);

        $publication->active=false;

        $publication->save();
        return redirect('/publication');
    }


    public function update_to_true($id)
    {
        $publication = Publication::find($id);

        $publication->active=true;

        $publication->save();
        return redirect('/publication');
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
        
        return redirect('/publication');
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
