<?php namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class LoginModel extends Model
{
    protected $db;
    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function verifyEmail($email)
    {
        $builder = $this->db->table('users');
        $builder->select('uniid,status,username,pass');
        $builder->where('email', $email);
        $result = $builder->get();
        if(count($result->getResultArray())>0)
        {
            return $result->getRowArray();
        }
        else{
            return false;
        }
    }

    public function saveLoginInfo($data)
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('login_activity');
        $builder->insert($data);
        if($this->db->affectedRows()==1)
        {
            return $this->db->insertID();
        }else{
            return false;
        }
    }

    // public function getUserslist()
    // {
    //     $db = \Config\Database::connect();
    //     $query = $db->query("SELECT * from admin_tbl;");
    //     $result = $query->getResult();
    //     if(count($result)>0)
    //     {
    //         return $result;
    //     }else{
    //         return false;
    //     }
    // }

    public function updatedAt($id)
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('users');
        $builder->where('uniid',$id);
        $builder->update(['updated_at'=>date('Y-m-d h:i:s')]);
        if($this->db->affectedRows()>0)
        {
            return true;
        }else{
            return false;
        }
    }

    public function verifyToken($token)
    {
        // $this->db = \Config\Database::connect();
        $builder = $this->db->table('users');
        $builder->select('uniid,username,updated_at');
        $builder->where('uniid',$token);
        $result=$builder->get();
        // print_r($result);exit;
        if(count($result->getResultArray())>0)
        {
            // print_r($result->getRowArray());exit;
            return $result->getRowArray();
        }else{
            return false;
        }
    }

    public function updatePassword($token, $password)
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('users');
        $builder->where('uniid', $token);
        $builder->update(['pass'=>$password]);
        if($this->db->affectedRows()>0)
        {
            return true;
        }else{
            return false;
        }
    }
}