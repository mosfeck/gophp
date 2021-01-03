<?php namespace App\Controllers;
use App\Models\ContactModel;

class ContactControl extends BaseController
{
	public $contactModel;
	public function __construct()
	{
		helper(['form']);
		$this->contactModel = new ContactModel();
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	}
	public function index()
	{
		helper(['form']);
		$data = [];
		
		$data['validation'] = null;

		$session = \CodeIgniter\Config\Services::session();
		$rules = [
			'uname'=>'required|min_length[3]|max_length[20]',
			'email'=>'required|valid_email',
			'mobile'=>'required|numeric|exact_length[11]',
			'message'=>'required',
		];

		if($this->request->getMethod()== 'post')
		{
			if($this->validate($rules))
			{
				$cdata = [
					'uname'=>$this->request->getVar('uname',FILTER_SANITIZE_STRING),
					'email'=>$this->request->getVar('email',FILTER_SANITIZE_STRING),
					'mobile'=>$this->request->getVar('mobile',FILTER_SANITIZE_STRING),
					'message'=>$this->request->getVar('message',FILTER_SANITIZE_STRING),
				];

				$status = $this->contactModel->saveData($cdata);
				if($status)
				{
					$session->setTempdata('success','Thanks, we will get back soon', 3);
					return redirect()->to(site_url('ContactControl'));
				}else{
					$session->setTempdata('error','Sorry! Try again', 3);
					return redirect()->to(site_url('ContactControl'));
				}

			}else{
				$data['validation'] = $this->validator;
			}

		}
		return view('contact_view',$data);
	}

	// public function usersList()
	// {
	// 	$userModel = new UserModel();
	// 	$data['users'] = $userModel->getUserslist();
	// 	return view('userlist_view', $data);
	// }

}
