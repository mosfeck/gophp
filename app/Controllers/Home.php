<?php namespace App\Controllers;
use App\Controllers\Admin\Shop as adminShop;

class Home extends BaseController
{
	public function index()
	{
		$data = [
            'page_title'=>'My blog title',
			'page_heading'=>'My blog heading'
		];


		return view('layouts/main', $data);
	}

	public function form()
	{
		helper('form');
		$data = [
            'page_title'=>'My blog title',
			'page_heading'=>'My blog heading'
		];


		return view('form', $data);
	}


	

}
