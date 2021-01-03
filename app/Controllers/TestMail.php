<?php namespace App\Controllers;


class TestMail extends BaseController
{
	public function index()
	{
		// echo "Working with Email";
		$to = 'mosfeck@office.bdcom.com';
		$subject = 'Account Activation';
		$message = 'Hi Mosfeck,<br><br>Thanks Your account created successfuly.
				Please click below link to activate your account<br>'
				.'<a href="'.base_url().'/testmail/verify" target="_blank">
				Activate now</a><br><br>Thanks<br>Team';

		$email = \Config\Services::email();
		$email->setTo($to);
		$email->setFrom('mosfeckbd@gmail.com');
		// $email->setCC('somecc@mail.com');
		// $email->setBCC('somebcc@mail.com');
		$email->setSubject($subject);
		$email->setMessage($message);
		$filepath = 'public/assets/images/image1.jpg';
		// print_r($filepath);exit;
		$email->attach($filepath);

		if($email->send())
		{
			echo "Account Create successfully. Please activate your account";
		}else{
			$data = $email->printDebugger(['headers']);
			print_r($data);
		}
	}

	public function verify()
	{
		echo "Account Verified";
	}

	

}
