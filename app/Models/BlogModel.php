<?php namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table      = 'posts';
    protected $primaryKey = 'post_id';

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['post_title', 'post_content'];

    protected $useTimestamps = true;
    protected $createdField  = 'post_created_at';
    protected $updatedField  = 'post_updated_at';
    protected $deletedField  = 'post_deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    // public function getPosts()
    // {
    //     $builder = $this->db->table('posts');
    //     $builder->join('users', 'posts.post_author = users.user_id');
    //     $posts = $builder->get()->getResult();
    //     return $posts;

    // }
    public function insertData($data)
    {
        $query = $this->db->table($this->table)->insert($data);
    }
}