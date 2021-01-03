<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;

class CustomModel
{
    protected $db;
    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }


    public function all()
    {
        return $this->db->table('posts')->get()->getResult();
    }

    public function where()
    {
        return $this->db->table('posts')
                        ->where(['post_id >' => 90])
                        ->where(['post_id <' => 95])
                        ->where(['post_id !=' => 91])
                        ->orderBy('post_id', 'ASC')
                        ->get()
                        ->getResult();
    }

    public function join()
    {
        return $this->db->table('posts')
                        ->where(['post_id >' => 50])
                        ->where(['post_id <' => 60])
                        ->join('users', 'posts.post_author=users.user_id')
                        ->get()
                        ->getResult();
    }

    
    public function like()
    {
        return $this->db->table('posts')
                        ->like('post_content', 'new', 'both')
                        ->join('users', 'posts.post_author=users.user_id')
                        ->get()
                        ->getResult();
    }

     
    public function grouping()
    {
        return $this->db->table('posts')
                        ->groupStart()
                        ->where(['post_id >' => 25, 'post_created_at <' => '1990-01-01 00:00:00'])
                        ->groupEnd()
                        ->orWhere('post_author', 10)
                        ->like('post_content', 'new', 'both')
                        ->join('users', 'posts.post_author=users.user_id')
                        ->get()
                        ->getResult();
    }


    public function getPosts()
    {
        $builder = $this->db->table('posts');
        $builder->join('users', 'posts.post_author = users.user_id');
        $posts = $builder->get()->getResult();
        return $posts;

    }
}