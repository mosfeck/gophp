<?php

namespace App\Controllers;

use App\Models\RegisterModel;

class RegisterControl extends BaseController
{

	public $RegisterModel;
	public $session;
	public $email;
	public function __construct()
	{

		helper(['form','date']);
		$this->RegisterModel = new RegisterModel();
		$this->session = \CodeIgniter\Config\Services::session();
		$this->email = \Config\Services::email();
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	}
	public function index()
	{
		helper(['valid']);
		$data = [];
		$data['validation'] = null;


		$rules = [
			'username' => [
				'label'=>'User Name',
				'rules'=>'required|min_length[3]|max_length[20]'],
			'email' => 'required|valid_email',
			'pass' => [
				'label'=>'Password',
				'rules'=>'required|min_length[6]|max_length[16]'],
			'cpass' => [
				'label'=>'Confirm Password',
				'rules'=>'required|matches[pass]'],
			'mobile' => 'required|numeric|exact_length[11]',
		];

		if ($this->request->getMethod() == 'post') {
			if ($this->validate($rules)) {
				// echo "Save Data";
				$uniid = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz' . time()));
				$userdata = [
					'username' => $this->request->getVar('username', FILTER_SANITIZE_STRING),
					'email' => $this->request->getVar('email'),
					'mobile' => $this->request->getVar('mobile', FILTER_SANITIZE_STRING),
					'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
					'uniid' => $uniid,
					'activation_date' => date("Y-m-d h-i-s"),
				];

				$status = $this->RegisterModel->createUser($userdata);
				if ($status) {
					$to = $this->request->getVar('email');
					$subject = 'Account Activation link';
					$message = 'Hi ' . $this->request->getVar('username', FILTER_SANITIZE_STRING) .
						", <br><br> Thanks your account created" .
						" successfully. Please click the link below to activate your account<br><br>"
						. "<a href='" . site_url() . "/RegisterControl/activate/" . $uniid . "' target='_blank'>Activate now</a><br><br>Thanks<br>";

					// $email = \Config\Services::email();
					$this->email->setTo($to);
					$this->email->setFrom('mosfeckbd@gmail.com', 'Mosfeck Uddin');
					$this->email->setSubject($subject);
					$this->email->setMessage($message);
					$filepath = 'public/assets/images/image1.jpg';
					$this->email->attach($filepath);

					if ($this->email->send()) {
						$this->session->setTempdata('success', 'Account Create successfully. Please activate your account', 3);
						return redirect()->to(site_url('RegisterControl/index'));
					} else {
						$this->session->setTempdata('error', 'Sorry! Unable to send activation link. contact admin', 3);
						return redirect()->to(site_url('RegisterControl/index'));
						// $data = $this->email->printDebugger(['headers']);
						// print_r($data);
					}
					// $this->session->setTempdata('success', 'Thanks, we will get back soon', 3);
					// return redirect()->to(site_url('RegisterControl/index'));
				} else {
					$this->session->setTempdata('error', 'Sorry! Unable to create an account Try again', 3);
					return redirect()->to(site_url('RegisterControl/index'));
				}
			} else {
				$data['validation'] = $this->validator;
			}
		}
		return view('register_view', $data);
	}

	// public function index()
	// {
	// 	return view('register_view');
	// }

	public function activate($uniid = null)
	{
		$data = [];
		if(!empty($uniid))
		{
			$userdata = $this->RegisterModel->verifyUniid($uniid);
			if($userdata)
			{
				// print_r($userdata);exit;

				if($this->verifyExpiryTime($userdata->activation_date))
				{
					if($userdata->status == 'inactive')
					{
						$status = $this->RegisterModel->updateStatus($uniid);
						if($status == true)
						{
							$data['success'] = 'Account activated successfully!';	
						}
					}else{
						$data['success'] = 'Your account is already activated';	
					}
				}else{
					$data['error'] = 'Sorry! Activation link was expired';
				}

			}else{
				$data['error'] = 'Sorry! We are unable to find your account';
			}
			
		}else{
			$data['error'] = 'Sorry! Unable to process you request';
		}
		return view('activate_view', $data);
	}

	public function verifyExpiryTime($regTime)
	{
		$currTime = now();
		$regTime = strtotime($regTime);
		$diffTime = (int)$currTime - (int)$regTime;
		if(3600 > $diffTime)
		{
			return true;
		}else{
			return false;
		}
	}

}
