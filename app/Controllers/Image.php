<?php

namespace App\Controllers;



class Image extends BaseController
{
	public function index()
	{
		helper(['form', 'image']);
		$data = [];
		if ($this->request->getMethod() == 'post') {
			$rules = [
				
				'theFile' => [
					'rules' => 'uploaded[theFile]|is_image[theFile]',
					'label' => 'The File'
				]
			];

			if ($this->validate($rules)) {

				$path = WRITEPATH.'uploads';
				$file = $this->request->getFile('theFile');

				$image = service('image');
				if($file->isValid() && !$file->hasMoved())
				{
					$file->move($path);
					$fileName = $file->getName();


					if(!file_exists($path. 'thumbs/'))
						mkdir($path . 'thumbs/', 755);

					$image->withFile(src($fileName))
						->fit(150, 150, 'center')
						->save($path . 'thumbs/' . $fileName);
				}
				// echo $file->getName();
				// exit();

				return redirect()->to('/Image/success');
			} else {
				$data['validation'] = $this->validator;
			}
		}
		
			return view('image', $data);
		
	}
	public function success()
	{
		return 'Record saved';
	}
}
