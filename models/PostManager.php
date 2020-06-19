<?php
class PostManager extends Manager{
    private $_postId;
    public function __construct($postId=''){
        $this->_postId = $postId;
    }
    public function getPosts()
    {
        return $this->dbConnect()->query('SELECT * FROM posts');
    }
    public function totalPostsLenght(){
        $numberOfPosts = $this->dbConnect()->query ('SELECT COUNT(*) as total FROM posts');
        $postsLenght = $numberOfPosts->fetch();
        return $postsLenght['total'];
    }
    // All Posts
    public function postsLoop(){
        $postsData = $this->getPosts();
        $postsArray= $postsData->fetchAll();
        foreach($postsArray as $post){
            $post['content'] = substr($post['content'], 0, 160).'...';
            require('views/templates/frontend/poststemplate.php');
        };
        $postsData->closeCursor();
    }
    //Single Post
    public function getSinglePost($id)
    {
        $response  = $this->dbConnect()->query('SELECT title , created_at , content  FROM posts WHERE id='.$id.' ');
        $requestedPost = $response->fetch();
        return $requestedPost ;
    }
};