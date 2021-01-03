<?php namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Users extends BaseController
{
	public function index()
	{
		echo '<h2>This is an Admin shop area</h2>';
		// return view('shop');
	}

	public function getAllUsers()
	{
		echo '<h2>Show all users</h2>';
		// echo "<h2>This is a product: ".$type." with an id: ".$product_id."<h2>";
		// return view('product');
	}

	// protected function adminCheck()
	// {
	// 	echo "This is a protected area";
	// }
	

}
