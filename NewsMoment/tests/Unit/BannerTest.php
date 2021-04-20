<?php

namespace Tests\Unit;

use Tests\TestCase; 
use App\Banner;
use App\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BannerTest extends TestCase
{
	public function setUp() : void {
		parent::setUp();

			$company_exist = Company::where('name', 'Company2')->first();
			if($company_exist != null) {
				$company_exist->delete();
			}

			$company = new Company();
			$company->name = "Company2";
			$company->save();
	}

    /**
		 * @test
     */
    public function correct_banner_save()
    {
			$banner_exist = Banner::where('title', 'Titulo Banner 2')->first();
			if($banner_exist != null) {
				$banner_exist->delete();
			}

			$banner = new Banner();
			$banner->title = "Titulo Banner 2";
			$banner->url = "titulo_banner_2";
			$banner->image_url = "imagen_2_url";
			$banner->views_counter = 20;
			$banner->ranking_type = 4;
			$banner->is_active = false;

			$banner->company_name = "Company2";
			$banner->save();

			$banner_find = Banner::where('title', 'Titulo Banner 2')->first();

			$this->assertEquals($banner_find->title, 'Titulo Banner 2');
			$this->assertEquals($banner_find->url, 'titulo_banner_2');
			$this->assertEquals($banner_find->image_url, 'imagen_2_url');
			$this->assertEquals($banner_find->views_counter, 20);
			$this->assertEquals($banner_find->ranking_type, 4);
			$this->assertEquals($banner_find->is_active, false);
			$this->assertEquals($banner_find->company_name, "Company2");
			$banner->delete();
    }
}
