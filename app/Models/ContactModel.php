<?php namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'contact_tbl';
    protected $primaryKey = 'id';
    protected $allowedFields = ['uname', 'email', 'mobile', 'message'];
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

    public function saveData($data){
        $db = \Config\Database::connect();
        $builder = $db->table('contact_tbl');
        $res = $builder->insert($data);
        if($res->connID->affected_rows >= 1)
        {
            return true;
        }else{
            return false;
        }
    }



    // protected $table      = 'posts';
    // protected $primaryKey = 'post_id';

    // // protected $returnType     = 'array';
    // // protected $useSoftDeletes = true;

    // protected $allowedFields = ['post_title', 'post_content'];

    // protected $useTimestamps = true;
    // protected $createdField  = 'post_created_at';
    // protected $updatedField  = 'post_updated_at';
    // protected $deletedField  = 'post_deleted_at';

    // // protected $validationRules    = [];
    // // protected $validationMessages = [];
    // // protected $skipValidation     = false;

    // // public function getPosts()
    // // {
    // //     $builder = $this->db->table('posts');
    // //     $builder->join('users', 'posts.post_author = users.user_id');
    // //     $posts = $builder->get()->getResult();
    // //     return $posts;

    // // }
    // public function insertData($data)
    // {
    //     $query = $this->db->table($this->table)->insert($data);
    // }

    public function deleteData($id)
    {
        // $id fetch Id from user table
        // $db  = \Config\Database::connect();
        $db = \Config\Database::connect();
        $builder = $db->table('contact_tbl')
            ->where('id', $id)
            ->delete();
    }
}