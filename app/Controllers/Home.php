<?php namespace App\Controllers;
use App\Controllers\Admin\Shop as adminShop;

class Home extends BaseController
{
	public function index()
	{
		return view('layouts/main');
	}

	// function validation()
	// {
	// 	$shop = new Shop();
	// 	echo $shop->product('Laptop','Lenovo').'</br>';

	// 	$adminShop = new adminShop();
	// 	echo $adminShop->product('Laptop','Lenovo');
	// }

}
