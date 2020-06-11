<?php
    // Get Data connection
    //require_once('models/db.php');
    require_once('models/PostManager.php');
    require_once('models/CommentManager.php');
    use \Ayman\Blog\Models\PostManager;
    use \Ayman\Blog\Models\CommentManager;
    // Main Functions
    require('includes/functions.php');
    // Constollers
    function showIndex(){
        $postManager = new PostManager();
        $posts = $postManager ->getPosts();
        require('views/indexView.php');
    }
    function showPosts(){
        $title = 'Chapitres';
        //get all posts
        $postManager = new PostManager();
        $posts = $postManager ->getPosts();
        require('views/postsView.php');
    }
    function showSinglePost($postId){
        //get Post DATA
        $postManager = new PostManager();
        $singlePost = $postManager ->getSinglePost($postId);
        $title = $singlePost['title'];
        //get Post Comment
        $commentManager = new CommentManager();
        $commentsArray = $commentManager->getComments($postId);    
        require('views/postView.php');
    }
    function addComment($postId,$pseudo,$comment){
        $commentManager = new CommentManager();
        //get Post Comment   
       // require('views/postView.php');
        $addComment=$commentManager->insertComment($postId,$pseudo,$comment);
        if ($addComment === false) {
            die('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: /blog/?id='.$postId.'&action=Chapitre');
        }
    }