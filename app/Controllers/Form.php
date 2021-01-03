<?php

namespace App\Controllers;



class Form extends BaseController
{
	
	public function index()
	{
		helper(['form']);
		$data = [];
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'email' => [
					'rules' => 'required|valid_email',
					'label' => 'Email address',
					'errors' => [
						'required' => 'Email address is required field',
						'valid_email' => 'please add a valid email'
					]
				],
				'password' => [
					'rules' => 'required',
					'label' => 'Password',
					'errors' => [
						'required' => 'Password is required field',
						
					]
				],
				'mobile' => [
					'rules' => 'required|numeric|exact_length[11]',
					'label' => 'Mobile',
					'errors' => [
						'required' => 'Mobile number is required ',
						'numeric' => 'Mobile {value} should be numbers',
						'exact_length'=>'Mobile {value} should contains exactly {param} digits'
					]
				],
				'theFile' => [
					'rules' => 'uploaded[theFile]|max_size[theFile, 1024]|is_image[theFile]',
					'label' => 'The File'
				]
			];

			if ($this->validate($rules)) {
				$file = $this->request->getFile('theFile');
				if($file->isValid() && !$file->hasMoved())
				{
					// $file->move(WRITEPATH.'uploads');
					// $file->move('./uploads/');
					$file->move('./uploads/images',);
					$fileName =  $file->getClientName();
					// $filepath = base_url(WRITEPATH.'uploads').$fileName;
					// $filepath = WRITEPATH.'uploads'.$fileName;
					$filepath = base_url()."/uploads/images/".$fileName;
					return redirect()->to(base_url('/Form/success'))->with('filepath', $filepath);
				}
				// echo $file->getName();
				// exit();
				// return view('image_preview', $filepath);
				
			} else {
				$data['validation'] = $this->validator;
			}
		}
		
			return view('form', $data);
		
	}
	public function success()
	{
		return view('image_preview');
	}
}
