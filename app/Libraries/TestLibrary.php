<?php namespace App\Libraries;

use App\Models\ContactModel;

class TestLibrary
{
    public $db;
    public $contactModel;
    public function __construct()
    {
        $this->db = \config\Database::connect();
        $this->contactModel = new ContactModel($this->db);
        
    }
    public function getData()
    {
        // return $this->db->query("select * from contact_tbl")->getResultArray();
        return $this->contactModel->findAll();
    }

    public function displayData()
    {
        return "Display data";
    }
}