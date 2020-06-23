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
    public function showAllPosts($view='front')
    {
        $postsArray = PostManager::getAllPosts(); 
        foreach($postsArray as $post){
            $this->_postId = $post['id'];
            $this->_title = $post['title'];
            $this->_date = $post['created_at'];
            $this->_content = substr($post['content'], 0, 160).'...';
            require('views/templates/poststemplate.php');
            if($view == 'front'){
            echo $frontPosts;
            }else{
            echo $backPosts;
            }
        };
    }
    public function showSinglePost()
    {
        $post = PostManager::getSinglePost($this->_postId);
        $this->_title = $post['title'];
        $this->_content = $post['content'];
        $this->_date= $post['created_at'];
        $this->_id= $this->_postId;
        return $post;
    }
    public function showAllComments()
    {
        $commentsArray = CommentManager::getAllComments();
        foreach($commentsArray as $comment){
            echo'
            <div class="d-flex back-card p-2">
            <p class="w-25 text-center d-flex flex-column">
            <span>Chapitre '.$comment['article_id'].'</span>
            <span>Par: '.$comment['pseudo'].'</span>
            <span>'.$comment['created_at'].'</span>
            </p>
            <p class="w-75">'.$comment['content'].'</p>

            </div>';
        };
    }
    public function showPostComments($view='front')
    {
        $this->_commentsArray = CommentManager::getPostComments($this->_postId);
        foreach($this->_commentsArray as $comment){
            require('views/templates/commentstemplate.php');
            if($view == 'front'){
                echo $frontComments;
            }else{
                echo $backComments;
            }
        };
    }
}