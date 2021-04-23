<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use App\Editor;

class UltimosController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $pag = 1)
    {
			$publication_controller = new PublicationController();
			// Get publictions
			// TODO
			/* $publications_all = $publication_controller->get_last_publications(null, 15*$pag); */
			$editors = array();
			$publications = array();
			$dates = array();
			$all = array();
			for($i = 0;$i < count($publications) && $i < 15; $i++) {
				$user = User::where('email', $publications[$i]['editor_email'])->first()->toArray();
				array_push($editors, $user);
				array_push($publications, $publications_all[$i]);
				if($publications[$i]['created_at'] != null) {
					$date = UtilController::getCreatedAtAttribute($publications[$i]['created_at']);
					array_push($dates, $date);
					array_push($all, ['publication' => $publications[$i],
														'editor' => $editors[$i],
														'date' => $date[$i]]);
				}
			}

			$params = [
				'count' => count($all),
			];
			/* $params = $all; */
				/* 'publications' => $publications, */ 
				/* 'editors'	=> $editors, */
				/* 'dates' => $dates, */
			/* ]; */

			return view('public/ultimos', compact('params'));
    }
}
