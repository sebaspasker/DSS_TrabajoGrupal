<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon;

class UtilController extends Controller
{
	public static function getCreatedAtAttribute($date)
	{
			return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
	}

	public static function getUpdatedAtAttribute($date)
	{
			return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
	}
}
