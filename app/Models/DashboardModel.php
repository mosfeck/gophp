<?php namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    public function getLoggedInUserData($uniid)
    {
        $builder = $this->db->table('users');
        $builder->where('uniid', $uniid);
        $result = $builder->get();
        if(count($result->getResultArray())>0)
        {
            return $result->getRow();
        }else{
            return false;
        }
    }

    public function updateLogoutTime($id){
        date_default_timezone_set('Asia/Dhaka');
        $db = \Config\Database::connect();
        $builder = $db->table('login_activity');
        $builder->where('id',$id);
        $builder->update(['logout_time'=>date('Y-m-d h:i:s')]);
        if($db->affectedRows()>0)
        {
            return true;
        }
    }

    public function getLoginUserInfo($id)
    {
        $builder = $this->db->table('login_activity');
        $builder->where('uniid', $id);
        $builder->orderBy('id','DESC');
        $builder->limit(10);
        $result = $builder->get();
        if(count($result->getResultArray())>0)
        {
            return $result->getResult();
        }else{
            return false;
        }
    }
    
    public function updateAvatar($path, $id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('uniid',$id);
        $builder->update(['profile_pic'=>$path]);
        if($db->affectedRows()>0)
        {
            return true;
        }else{
            return false;
        }
    }

}