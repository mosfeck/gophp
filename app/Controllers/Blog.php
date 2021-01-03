<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\CustomModel;

class Blog extends BaseController
{
	use \CodeIgniter\API\ResponseTrait;

	public function index()
	{
		$db = db_connect();
		$model = new CustomModel($db);
		// $model = new BlogModel();
		echo '<pre>';
		print_r($model->getPosts());
		echo '</pre>';

		$data = [
			'meta_title' => 'Codeigniter 4 Blog',
			'title' => 'This is a Blog Page',
		];
		// $posts = ['Title 1','Title 2','Title 3'];
		$data['posts'] = ['Title 1', 'Title 2', 'Title 3'];

		// echo view('templates/header', $data);
		// echo view('blog', $data);
		// echo view('templates/footer');

		return view('blog', $data);
	}

	public function post($id)
	{
		$model = new BlogModel();
		$post = $model->find($id);
		if ($post) {
			$data = [
				'meta_title' => $post['post_title'],
				'title' => $post['post_content'],
				'post' => $post
			];
		} else {
			$data = [
				'meta_title' => 'not found',
				'title' => 'not found',
			];
		}


		// echo view('templates/header', $data);
		// echo view('single_post');
		// echo view('templates/footer');


		return view('single_post', $data);
	}

	public function create()
	{
		$model = new BlogModel();

		$data = [
			'meta_title' => 'New Post',
			'title' => 'Create new post',
		];

		



		// echo view('templates/header', $data);
		// echo view('single_post');
		// echo view('templates/footer');

		if ($this->request->getMethod() == 'post') {
			// $data = [
			// 	'post_title' => $this->request->getVar('post_title'),
			// 	'post_content' => $this->request->getVar('post_content')
			// ];
			$model = new BlogModel();
			$model->save($_POST);
			return redirect()->to(site_url('Blog'));
			if($model->errors())
			{
				return $this->fail($model->errors());
			}
			// if ($save === false) {
			// 	return $this->failServerError();
			// 	// if ($error) {
			// 	// 	echo 'Record saved';
			// 	// } else {
			// 	// 	echo 'Can not save';
			// 	// }
			// }
		// }
		// if ($save) {
		// 	echo 'Record saved';
		// 	// return redirect()->to(site_url('Blog'));
		// }else{
		// 	echo 'Can not save';
		// }
		}
		return view('new_post', $data);
	}
	public function delete($id)
	{
		$model = new BlogModel();
		$post = $model->find($id);
		if ($post) {
			$model->delete($id);
			return redirect()->to(site_url('Blog'));
		}
	}

	public function edit($id)
	{
		$model = new BlogModel();
		$post = $model->find($id);

		$data = [
			'meta_title' => $post['post_title'],
			'title' => $post['post_title'],
		];

		
		if ($this->request->getMethod() == 'post') {
			$model = new BlogModel();
			$_POST['post_id']= $id;
			$model->save($_POST);
			$post = $model->find($id);
		}
		$data['post'] = $post;
		return view('edit_post', $data);
	}
}
