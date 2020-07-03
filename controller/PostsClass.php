<?php
// Request all blog posts + all blog comments + all signaled comments
namespace Controller;

use Model\CommentManager;
use Model\PostManager;

class PostsClass
{
    public $_postsArray;
    public $_commentsArray;
    
    public function __construct($view)
    {
        $this->_commentsArray = CommentManager::getAllComments();
        $this->_postsArray = PostManager::getAllPosts();
        $this->_view = $view;
    }
    public function showAllPosts()
    {   // SELECT all blog posts From DB + loop in returnin Array
        foreach ($this->_postsArray as $post) {
            $post['content']= substr($post['content'], 0, 160).'...';
            echo postsTemplate($this->_view, $post);
        };
    }

    public function showAllComments()
    { // SELECT all blog comments From DB + loop in returnin Array
        foreach ($this->_commentsArray as $comment) {
            echo commentsTemplate($this->_view, $comment);
        }
    }

    public function showSignaledComments()
    {   // SELECT all blog comments From DB with row 'Signalement = 1'+ loop in returnin Array
        foreach ($this->_commentsArray as $comment) {
            if ($comment['Signalement']==1) {
                echo commentsTemplate('signaled', $comment);
            }
        };
    }
}
