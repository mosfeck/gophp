<?php

namespace App\Controllers;
// use App\Models\ContactModel;

class SigninControl extends BaseController
{
	public $contactModel;
	public function __construct()
	{
		helper(['form']);
		// $this->contactModel = new ContactModel();
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	}
	public function index()
	{
		$data = [];



		if ($this->request->getMethod() == 'post') {
			$rules = [
				'username' => 'required',
				'password' => 'required',
			];
			if ($this->validate($rules)) {
				$username = $this->request->getVar('username');
				$password = $this->request->getVar('password');

				$throttler = \config\Services::throttler();
				if($throttler->check("login", 4, MINUTE)===false)
				{
					session()->setFlashdata('error', 'Too many hit to server. Try again');
					return redirect()->to(site_url('SigninControl'));
				}
				// if ($allow) {
					if ($username == 'mosfeck' && $password == '123') {
						echo 'Okay';
					} else {
						$data['error'] = 'Wrong credentials';
					}
				// } else {
				// 	$data['error'] = 'Max number of login attempts. Try again after 1 minute';
				// }
			} else {
				$data['validation'] = $this->validator;
			}
		}
		return view('signin_view', $data);
	}

	// public function usersList()
	// {
	// 	$userModel = new UserModel();
	// 	$data['users'] = $userModel->getUserslist();
	// 	return view('userlist_view', $data);
	// }

}
