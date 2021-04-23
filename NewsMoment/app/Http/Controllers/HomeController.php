<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
			$pub_controller = new PublicationController();
			$publications = $pub_controller->get_last_publications(null, 3);
			$editor1 = User::where('email', $publications[0]->editor_email)->first();
			$editor2 = User::where('email', $publications[1]->editor_email)->first();
			$editor3 = User::where('email', $publications[2]->editor_email)->first();

			if($publications[0]['created_at'] != null) 
				$date1 = UtilController::getCreatedAtAttribute($publications[0]['created_at']);
			else $date1 = "";
			if($publications[1]['created_at'] != null) 
				$date2 = UtilController::getCreatedAtAttribute($publications[1]['created_at']);
			else $date2 = "";
			if($publications[2]['created_at'] != null)
			 	$date3 = UtilController::getCreatedAtAttribute($publications[2]['created_at']);
			else $date3 = "";
			$pub_params = [
				'publication1' => $publications[0],
				'publication2' => $publications[1],
				'publication3' => $publications[2],
				'editor1' => $editor1->name,
				'editor2' => $editor2->name,
				'editor3' => $editor3->name,
				'date1'=> $date1,
				'date2'=> $date1,
				'date3'=> $date3,
			];

			return view('public/home', compact('pub_params'));
    }
}
