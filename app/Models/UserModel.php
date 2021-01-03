<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function getUserslist()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * from admin_tbl;");
        $result = $query->getResult();
        if(count($result)>0)
        {
            return $result;
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
}