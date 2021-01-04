<?php namespace App\Controllers;
use App\Libraries\TestLibrary;

class CustomLibControl extends BaseController{
    public $tl;
    public function __construct()
    {
        $this->tl = new TestLibrary();
    }

    public function index()
    {
        $data = $this->tl->getData();
        echo '<pre>';
        print_r($data);
        echo '<pre>';
    }
}