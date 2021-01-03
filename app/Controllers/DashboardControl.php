<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class DashboardControl extends BaseController
{
	// public $session;
	public $dModel;
	public function __construct()
	{
		helper(['form']);
		// $this->session = \CodeIgniter\Config\Services::session();
		$this->dModel = new DashboardModel();
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	}
	public function index()
	{

		if (!session()->has('logged_user')) {
			return redirect()->to(site_url() . '/LoginControl');
		}

		$uniid = session()->get('uniid');

		// print_r($uniid);exit;
		$data['userdata'] = $this->dModel->getLoggedInUserData($uniid);
		// print_r($userdata);exit;
		return view('dashboard_view', $data);
	}

	public function logout()
	{
		if (session()->has('logged_info')) {
			
			$la_id = session()->get('logged_info');
			$this->dModel->updateLogoutTime($la_id);
		}
		session()->remove('logged_user');
		session()->destroy();
		return redirect()->to(site_url() . '/LoginControl');
	}

	public function login_activity()
	{

		$data['userdata'] = $this->dModel->getLoggedInUserData(session()->get('uniid'));
		$data['login_info'] = $this->dModel->getLoginUserInfo(session()->get('uniid'));
		return view('login_activity_view', $data);
	}

	public function avatar()
	{
		$data = [];
		$data['userdata'] = $this->dModel->getLoggedInUserData(session()->get('uniid'));
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'avatar' => 'uploaded[avatar]|max_size[avatar,1024]|ext_in[avatar,jpg,png,gif,pdf,txt]'
			];
			if ($this->validate($rules)) {
				$file = $this->request->getFile('avatar');
				if ($file->isValid() && !$file->hasMoved()) {
					// if ($file->move(FCPATH . '\profiles', $file->getRandomName())) {
						// if ($file->move( './profiles/'. $file->getRandomName())) {
						if ($file->move( './public/profiles')) {
							
						$path = base_url() . '/public/profiles/' . $file->getName();
						$status = $this->dModel->updateAvatar($path, session()->get('uniid'));
						if ($status == true) {
							session()->setTempdata('success', 'Photo uploaded successfully!', 3);
							return redirect()->to(site_url('DashboardControl/avatar'));
						} else {
							session()->setTempdata('error', 'Sorry! unable to upload avatar', 3);
							return redirect()->to(site_url('DashboardControl/avatar'));
						}
					} else {
						session()->setTempdata('error', $file->getErrorString(), 3);
						return redirect()->to(site_url('DashboardControl/avatar'));
					}
				} else {
					session()->setTempdata('error', 'You have uploaded invalid file', 3);
					return redirect()->to(site_url('DashboardControl/avatar'));
				}
			} else {
				$data['validation'] = $this->validator;
			}
		}
		return view('avatar_view', $data);
	}

	// public function show()
	// {
	// 	return view('avatar_view');
	// }
}
