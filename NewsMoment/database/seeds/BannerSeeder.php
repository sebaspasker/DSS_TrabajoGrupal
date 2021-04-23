<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			$titles = ["Covid banner", "Lilus banner", "Planta gráfica banner"];
			$ranking_type = [2, 1, 1];
			$image_url = ['banner1.gif', 'banner2.png', 'banner3.gif'];
			$url = ['https://es.wikipedia.org/wiki/Jugadores_Anónimos','https://es.wikipedia.org/wiki/Valle_del_Alto_San_Lorenzo', 'https://es.wikipedia.org/wiki/Ricardo_Arques'];
			$companies = ['Árboles Ferrol', 'S.A. Artisan', 'S.L. Cars', 'Pipe the Line', 'S.S.S.A.A.A'];
			for($i=0; $i< count($titles) ; $i++) {
				\DB::table('banners')->insert(array(
					'title' => $titles[$i],
					'url' => "$url[$i]",
					'image_url' => "/static/img/banner/$image_url[$i]",
					'ranking_type' => $ranking_type[$i],
					'is_active' => true,
					'views_counter' => 0,
					'company_name' => $companies[$i],
				));
				
			}
		}
}
