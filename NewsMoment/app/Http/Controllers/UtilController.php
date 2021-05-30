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

	public static function slugify($text)
	{
		// replace non letter or digits by -
		$text = preg_replace('~[^\pL\d]+~u', '-', $text);

		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);

		// trim
		$text = trim($text, '-');

		// remove duplicate -
		$text = preg_replace('~-+~', '-', $text);

		// lowercase
		$text = strtolower($text);

		if (empty($text)) {
			return 'n-a';
		}

		return $text;

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
	}}
}
