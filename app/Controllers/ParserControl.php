<?php namespace App\Controllers;

class ParserControl extends BaseController{
    public function index()
    {
        $parser = \Config\Services::parser();

        $data = [
            'page_title'=>'My blog title',
            'page_heading'=>'My blog heading',
            'subjects_list'=>[
                ['subject'=>'HTML','abbr'=>'Hyper text markup language'],
                ['subject'=>'CSS','abbr'=>'Cascade style sheets'],
                ['subject'=>'JSON','abbr'=>'Javascript object notation'],
                ['subject'=>'AJAX','abbr'=>'Asynchronous Javascript and XML'],
                ['subject'=>'PHP','abbr'=>'Hypertext preprocessor'],
            ],
            'status'=> true,
        ];

        $parser->setData($data);
        return $parser->render('myView');
    }
}