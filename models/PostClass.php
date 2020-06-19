<?php
class PostClass {
    public $_postId;
    public $_title;
    public $_content;
    public $_date;
    public $_commentsArray;
    public function __construct($postId=""){
        $this->_postId = $postId;
    }
    public function showAllPosts()
    {
        $postsArray = PostManager::getAllPosts();
        foreach($postsArray as $post){
            $this->_postId = $post['id'];
            $this->_title = $post['title'];
            $this->_content = substr($post['content'], 0, 160).'...';
            require('views/templates/frontend/poststemplate.php');
        };
    }
    public function showPost()
    {
        $post = PostManager::getSinglePost($this->_postId);
        $this->_title = $post['title'];
        $this->_content = $post['content'];
        $this->_date= $post['created_at'];
        return $post;
    }
    public function showComments()
    {
        $this->_commentsArray = CommentManager::getComments($this->_postId);
        foreach($this->_commentsArray as $comment){
            echo CommentManager::commentTemplate($comment['pseudo'],$comment['created_at'],$comment['content']);
        };
    }

}