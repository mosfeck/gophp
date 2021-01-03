<?php namespace App\Controllers;
// use App\Controllers\Admin\Shop as adminShop;

class Sample extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	public function create($name, $two)
	{
		echo "This is Create Methods: ".$name.",".$two;
	}
}
