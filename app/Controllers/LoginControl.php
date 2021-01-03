<?php

namespace App\Controllers;

use App\Models\LoginModel;

class LoginControl extends BaseController
{
	public $LoginModel;
	public $session;
	public function __construct()
	{
		helper(['form']);
		$db = db_connect();
		$this->LoginModel = new LoginModel($db);
		$this->session = session();
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	}
	public function index()
	{
		$data = [];

		// $data['validation'] = null;


		$rules = [

			'email' => 'required|valid_email',
			'pass' => 'required|min_length[6]|max_length[16]',

		];

		if ($this->request->getMethod() == 'post') {
			if ($this->validate($rules)) {

				$email = $this->request->getVar('email');
				$password = $this->request->getVar('pass');

				// $throttler = \config\Services::throttler();
				// $allow = $throttler->check("login", 4, MINUTE);
				// if ($allow) {
					$userdata = $this->LoginModel->verifyEmail($email);
					if ($userdata) {
						if (password_verify($password, $userdata['pass'])) {
							if ($userdata['status'] == 'active') {
								date_default_timezone_set('Asia/Dhaka');
								$loginInfo = [
									'uniid' => $userdata['uniid'],
									'agent' => $this->getUserAgentInfo(),
									'ip' => $this->request->getIPAddress(),
									'login_time' => date('Y-m-d h:i:s')
								];
								$la_id = $this->LoginModel->saveLoginInfo($loginInfo);
								if ($la_id) {
									$this->session->set('logged_info', $la_id);
								}
								$this->session->set(array('logged_user' => TRUE, 'uniid' => $userdata['uniid']));
								return redirect()->to(site_url() . '/DashboardControl');
							} else {
								$data['error'] = 'Sorry, Please activate your account. Contact admin';
								// $this->session->setTempdata('error', 'Sorry, Please activate your account. Contact admin', 3);
								// return redirect()->to(site_url('LoginControl'));
							}
						} else {
							$data['error'] = 'Sorry, Wrong password for that email';
							// $this->session->setTempdata('error', 'Sorry, Wrong password for that email', 3);
							// return redirect()->to(site_url('LoginControl'));
						}
					} else {
						$data['error'] = 'Sorry, email does not exists';
						// $this->session->setTempdata('error', 'Sorry, email does not exists', 3);
						// return redirect()->to(site_url('LoginControl'));
					}
				// } else {
				// 	$data['error'] = 'Max number of login attempts. Try again after 1 minute';
				// }

				// $cdata = [
				// 	'uname'=>$this->request->getVar('uname',FILTER_SANITIZE_STRING),
				// 	'email'=>$this->request->getVar('email',FILTER_SANITIZE_STRING),
				// 	'mobile'=>$this->request->getVar('mobile',FILTER_SANITIZE_STRING),
				// 	'message'=>$this->request->getVar('message',FILTER_SANITIZE_STRING),
				// ];

				// $status = $this->contactModel->saveData($cdata);
				// if($status)
				// {
				// 	$session->setTempdata('success','Thanks, we will get back soon', 3);
				// 	return redirect()->to(site_url('LoginControl'));
				// }else{
				// 	$session->setTempdata('error','Sorry! Try again', 3);
				// 	return redirect()->to(site_url('LoginControl'));
				// }

			} else {
				$data['validation'] = $this->validator;
			}
		}
		return view('login_view', $data);
	}

	public function getUserAgentInfo()
	{
		$agent = $this->request->getUserAgent();
		if ($agent->isBrowser()) {
			$currentAgent = $agent->getBrowser();
		} elseif ($agent->isMobile()) {
			$currentAgent = $agent->getMobile();
		} elseif ($agent->isRobot()) {
			$currentAgent = $agent->getRobot();
		} else {
			$currentAgent = 'Undefine user agent';
		}
		return $currentAgent;
	}

	public function forgot_password()
	{
		$data = [];
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'email' => [
					'label' => 'Email',
					'rules' => 'required|valid_email',
					'errors' => [
						'required' => '{field} field required',
						'valid_email' => 'Valid {field} required'

					]
				],
			];
			if ($this->validate($rules)) {
				$email = $this->request->getVar('email', FILTER_SANITIZE_EMAIL);
				$userdata = $this->LoginModel->verifyEmail($email);
				if (!empty($userdata)) {
					if ($this->LoginModel->updatedAt($userdata['uniid'])) {
						$to = $email;
						$subject = 'Reset Password Link';
						$token = $userdata['uniid'];
						$message = 'Hi ' . $userdata['username'] . '<br><br>'
							. 'Your reset password request has been received. Please click'
							. 'the link below link to reset your password<br><br>'
							. '<a href = "' . site_url() . '/LoginControl/reset_password/' . $token . '">Click_here <br>'
							. 'Thanks<br>';
						$email = \Config\Services::email();
						$email->setTo($to);
						$email->setFrom('mosfeckbd@gmail.com', 'Mosfeck');
						$email->setSubject($subject);
						$email->setMessage($message);
						if ($email->send()) {
							$this->session->setTempdata('success', 'Reset password link sent to your register email. Please verify within 15 minutes', 3);
							return redirect()->to(site_url('LoginControl/forgot_password'));
						} else {
							$data['mailError'] = $email->printDebugger(['headers']);
							print_r($data['mailError']);
						}
					} else {
						$this->session->setTempdata('error', 'Sorry, unable to update. try again', 3);
						return redirect()->to(site_url('LoginControl/forgot_password'));
					}
				} else {
					$this->session->setTempdata('error', 'Sorry, email does not exists', 3);
					return redirect()->to(site_url('LoginControl/forgot_password'));
				}
			} else {
				$data['validation'] = $this->validator;
			}
		}
		return view('forgot_pass_view', $data);
	}

	public function reset_password($token = null)
	{
		$data = [];
		if (!empty($token)) {
			$data['users'] = $this->LoginModel->verifyToken($token);
			//  print_r($data['users']['updated_at']);exit;
			if (!empty($data)) {
				if ($this->checkExpiryDate($data['users']['updated_at'])) {
					if ($this->request->getMethod() == 'post') {
						$rules = [
							'password' => [
								'label' => 'Password',
								'rules' => 'required|min_length[6]|max_length[16]'
							],
							'confirmPassword' => [
								'label' => 'Confirm Password',
								'rules' => 'required|matches[password]'
							],
						];
						if ($this->validate($rules)) {
							$password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
							if ($this->LoginModel->updatePassword($token, $password)) {
								$this->session->setTempdata('success', 'Password updated successfully!', 3);
								return redirect()->to(site_url('LoginControl'));
							} else {
								$this->session->setTempdata('error', 'Sorry, unable to update password. Try again', 3);
								return redirect()->to(site_url('LoginControl/reset_password'));
							}
						} else {
							$data['validation'] = $this->validator;
						}
					}
				} else {
					$data['error'] = 'Reset password link was expired';
				}
			} else {
				$data['error'] = 'Unable to find user account';
			}
		} else {
			$data['error'] = 'Sorry! Unauthorized access';
		}
		return view('reset_pass_view', $data);
	}

	public function checkExpiryDate($time)
	{
		$update_time = strtotime($time);
		$current_time = time();
		$timeDiff = ($current_time - $update_time) / 60;
		if ($timeDiff < 900) {
			return true;
		} else {
			return false;
		}
	}
}
