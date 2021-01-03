<?php namespace App\Models;

use CodeIgniter\Model;

class RegisterModel extends Model
{
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

    public function createUser($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $res = $builder->insert($data);
        if($db->affectedRows()==1)
        {
            return true;
        }else{
            return false;
        }
    }

    public function verifyUniid($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('activation_date,status,uniid');
        $builder->where('uniid',$id);
        $result = $builder->get();
        if($builder->countAll() > 1)
        {
            // print_r($result->getRow());exit;
            return $result->getRow();
        }else{
            return false;
        }
    }

    public function updateStatus($uniid = null)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('uniid', $uniid);
        $builder->update(['status'=>'active']);
        if($db->affectedRows()==1)
        {
            return true;
        }else{
            return false;
        }
    }

    



    
}