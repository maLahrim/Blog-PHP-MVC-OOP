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
    public function showAllPosts($view)
    {
        $postsArray = PostManager::getAllPosts();
        foreach($postsArray as $post){
            $this->_postId = $post['id'];
            $this->_title = $post['title'];
            $this->_date = $post['created_at'];
            $this->_content = substr($post['content'], 0, 160).'...';
            require('view/templates/common/poststemplate.php');
            if($view == 'front'){
            echo $frontPosts; // common/poststemplate.php
            }else{
            echo $backPosts; // common/poststemplate.php
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
    public function showAllComments($view)
    {
        $commentsArray = CommentManager::getAllComments();
            foreach($commentsArray as $comment){
                echo commentsTemplate($view,$comment);//common/commentstemplate.php
        };
    }
    public function showSignaledComments()
    {   
        $commentsArray = CommentManager::getAllComments();

            foreach($commentsArray as $comment){   
                if($comment['Signalement']==1){
                    echo commentsTemplate('signaled',$comment);
                }      
        };
    }
    public function showPostComments($view)
    {
        $commentsArray = CommentManager::getPostComments($this->_postId);
        foreach($commentsArray as $comment){

           echo commentsTemplate($view,$comment); //common/commentstemplate.php
        };
    }
}