<?php namespace App\Controllers;
use App\Models\UserModel;
use App\Models\BlogModel;
use App\Controllers\Admin\Shop as adminShop;

class Data extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	public function usersList()
	{
		$userModel = new UserModel();
		$data['users'] = $userModel->getUserslist();
		return view('userlist_view', $data);
	}

}
