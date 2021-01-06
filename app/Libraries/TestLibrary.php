<?php namespace App\Libraries;

use App\Models\ContactModel;
use CodeIgniter\HTTP\URI;

class TestLibrary
{
    public $db;
    public $contactModel;
    public $email;
    public $uri;
    public function __construct()
    {
        $this->db = \config\Database::connect();
        $this->email = \config\Services::email();
        $this->contactModel = new ContactModel();
        $this->uri = new URI(current_url());
        helper('form');
        
    }
    public function getData()
    {
        // return $this->db->query("select * from contact_tbl")->getResultArray();
        // return $this->contactModel->find(4);
        return $this->contactModel->findAll();
    }

    public function displayData()
    {
        return "Display data";
    }
}