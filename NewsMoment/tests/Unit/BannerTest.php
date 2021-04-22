<?php

namespace Tests\Unit;

use Tests\TestCase; 
use App\Banner;
use App\Company;
use App\Http\Controllers\BannerController;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BannerTest extends TestCase
{
		/*
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
		 */
	
	private function return_company_1() : Company {
		$company = new Company();
		$company->name = "Automoviles serrano";
		$company->image_url = "image_url1";
		$company->is_active = true;
		return $company;
	}

	private function return_banner_1() : Banner {
		$banner = new Banner();
		$banner->title = "Banner1";
		$banner->url = "banner_url1";
		$banner->image_url = "image_url1";
		$banner->ranking_type = 1;
		$banner->views_counter = 0;
		$banner->is_active = false;
		$banner->company_name = "Automoviles serrano";
		return $banner;
	}

	private function insert_values() {
		$company = $this->return_company_1();
		$company->save();
	}

	private function delete_values() {
		$banner = Banner::where('title', $this->return_banner_1()->title)->first();
		if($banner != null) $banner->delete();
		$company = Company::where('name', $this->return_company_1()->name)->first();
		if($company != null) $company->delete();
	}

	public function setUp() : void {
		parent::setUp();
		$this->delete_values();
		$this->insert_values();
	}

	/**
	 * @test
	 */
	public function test_insert_banner_controller() {
		$banner = $this->return_banner_1();
		$banner_controller = new BannerController();
		$val = $banner_controller->insert_banner($banner);
		$this->assertTrue($val);
		$search_banner = Banner::where('title', $banner->title)->first();
		$this->assertNotNull($search_banner);
		$this->assertEquals($banner->title, $search_banner->title);
		$this->assertEquals($banner->url, $search_banner->url);
		$this->assertEquals($banner->image_url, $search_banner->image_url);
		$this->assertEquals($banner->views_counter, $search_banner->views_counter);
		$this->assertEquals($banner->ranking_type, $search_banner->ranking_type);
		$this->assertEquals($banner->is_active, $search_banner->is_active);

	}

	/**
	 * @test
	 */
	public function test_delete_banner_controller() {
		$banner = $this->return_banner_1();
		$banner->save();
		$banner_controller = new BannerController();
		$val = $banner_controller->delete_banner($banner);
		$this->assertTrue($val);
		$search_banner = Banner::where('title', $banner->title)->first();
		$this->assertNull($search_banner);
	}

	/**
	 * @test
	 */
	public function test_modify_banner_controller() {
		$banner = $this->return_banner_1();
		$banner->save();
		$banner->image_url = "new_url";
		$banner->url = "new_url";
		$banner->views_counter= 100;
		$banner->ranking_type = 3;
		$banner->is_active = !$banner->is_active;
		$banner_controller = new BannerController();
		$val = $banner_controller->modify_banner($banner);
		$this->assertTrue($val);
		$search_banner = Banner::where('title', $banner->title)->first();
		$this->assertNotNull($search_banner);
		$this->assertEquals($banner->title, $search_banner->title);
		$this->assertEquals($banner->url, $search_banner->url);
		$this->assertEquals($banner->image_url, $search_banner->image_url);
		$this->assertEquals($banner->views_counter, $search_banner->views_counter);
		$this->assertEquals($banner->ranking_type, $search_banner->ranking_type);
		$this->assertEquals($banner->is_active, $search_banner->is_active);
		$this->assertEquals($banner->company_name, $search_banner->company_name);
		$this->assertEquals($banner->url, $search_banner->url);
	}
}
