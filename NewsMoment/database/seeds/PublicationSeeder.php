<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.  *
     * @return void
     */
    public function run()
    {
			 $faker = Faker::create();
				$titulo1 = 'El semáforo que "hace de vientre"... y otros disparates de la "gestapillo" del catalán';
				$subtitulo1 = 'Camareros, médicos y fuerzas de seguridad están en la diana de la policía ciudadana de la lengua';
				$image_url1 = 'publication1';
				$video_url1 = 'publication1';


				$titulo2 = 'Maroto anima a los españoles a planear sus vacaciones';
				$subtitulo2 = 'La ministra ha asegurado que hay "bastantes certezas" de que se alcanzará el 70%';
				$image_url2 = 'publication2';
				$video_url2 = 'publication2';

				$titulo3 = 'Pedro Sánchez se erige como "líder" de la lucha climática en la cumbre virtual de Biden';
				$subtitulo3 = 'Afirma que "la experiencia española demuestra que una transición ecológica justa es posible"';
				$image_url3 = 'publication3';
				$video_url3 = 'publication3';

				$titulo4 = 'El Gobierno mete en una ley publicada en el BOE';
				$subtitulo4 = 'Se trata de la norma que modifica el Código Penal para suprimir el delito';
				$image_url4 = 'publication4';
				$video_url4 = 'publication4';

				$titulo5 = 'Un islamista mata a una policía';
				$subtitulo5 = 'El agresor es un tunecino de 36 años, muerto a tiros por los compañeros de la víctima';
				$image_url5 = 'publication5';
				$video_url5 = 'publication5';

				$titulo6 = 'Un chiste que refuerza su ideología, el más gracioso que ha leído este joven en mucho tiempo';
				$subtitulo6 = 'CONSIDERA QUE EL CHISTE ES PERFECTO PORQUE “DA JUSTO DONDE TIENE QUE DAR”';
				$body6 = 'Esta mañana, el diario satírico El Mundo Today ha publicado un chiste que Juan Camuñas, de 27 años, ya considera que es el más gracioso que ha leído en mucho tiempo. Aunque el chiste quizás no es el más ingenioso de esta web satírica, el hecho de que refuerce la ideología de Camuñas lo ha convertido en “una absoluta genialidad”, según sus propias palabras.';
				$image_url6 = 'publication6';
				$video_url6 = 'publication6';

/**
				$titulo7 = 'Miles de padres, preocupados por un nuevo reto viral que arrasa en Internet: Opositar';
				$subtitulo7 = 'CONTENIDO PATROCINADO POR OPOSITATEST';
				$image_url7 = 'publication7';
				$video_url7 = 'publication7';
**/

				$titles = [$titulo1, $titulo2, $titulo3, $titulo4, $titulo5, $titulo6];
				$subtitle = [$subtitulo1, $subtitulo2, $subtitulo3, $subtitulo4, $subtitulo5, $subtitulo6];
				$image_urls = [$image_url1, $image_url2, $image_url3, $image_url4, $image_url5, $image_url6];
				$video_urls = [$video_url1, $video_url2, $video_url3, $video_url4, $video_url5, $video_url6];
				$categories = ['POLÍTICA', 'POLÍTICA', 'POLÍTICA', 'POLÍTICA', 'POLÍTICA', 'POLÍTICA'];
				$lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Itaque nostrum est-quod nostrum dico, artis est-ad ea principia, quae accepimus. Ab his oratores, ab his imperatores ac rerum publicarum principes extiterunt. Quaero igitur, quo modo hae tantae commendationes a natura profectae subito a sapientia relictae sint. Est enim effectrix multarum et magnarum voluptatum. Conferam tecum, quam cuique verso rem subicias; Sed tamen intellego quid velit. Nam si quae sunt aliae, falsum est omnis animi voluptates esse e corporis societate. Duo Reges: constructio interrete. Bonum integritas corporis: misera debilitas. Si verbum sequimur, primum longius verbum praepositum quam bonum.';

				for($i = 0; $i<count($titles); $i++) {
					\DB::table('publications')->insert(array(
						'slugname' => "slugname_publication_$i",
						'title' => "$titles[$i]",
						'subtitle' => "$subtitle[$i]",
						'source' => "Source $i",
						'image_url' => "/static/img/publication/$image_urls[$i].jpg",
						'video_url' => "/static/video/$video_urls[$i]",
						'category' => "$categories[$i]",
						'active' => true,
						'body' => "$lorem",
						'has_video' => false,
						'views_counter' => random_int(0, 100),
						'editor_email' => "email$i@email.com",
						'created_at' => now(),
						'updated_at' => now(),
					));
				}
			}
		}
