<?php
namespace Ayman\Blog\Models;
require_once('models/Manager.php');
class PostManager extends Manager{
    public function getPosts()
        {
            $dataBase = $this->dbConnect();
            $response = $dataBase->query('SELECT * FROM posts /*ORDER BY ID ASC LIMIT 0, 8*/');
            return $response;
        }
    public function getSinglePost($postId)
    {
            $dataBase = $this->dbConnect();
            $response  = $dataBase->query('SELECT title , created_at , content  FROM posts WHERE id='.$postId.' ');
            $requestedPost = $response->fetch();
            return $requestedPost ;
    }
    function totalPostsLenght(){
        $dataBase = $this->dbConnect();
        $numberOfPosts = $dataBase->query ('SELECT COUNT(*) as total FROM posts');
        $postsLenght = $numberOfPosts->fetch();
        return $postsLenght['total'];
    }
}