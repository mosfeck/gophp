<?php namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Shop extends BaseController
{
	public function index()
	{
		echo '<h2>This is an Admin shop area</h2>';
		// return view('shop');
	}

	public function product($type, $product_id)
	{
		// echo '<h2>This is a admin product</h2>';
		echo "<h2>This is an admin product: ".$type." with an id: ".$product_id."<h2>";
		// return view('product');
	}

	// protected function adminCheck()
	// {
	// 	echo "This is a protected area";
	// }
	

}
