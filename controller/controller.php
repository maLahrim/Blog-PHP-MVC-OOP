<?php
    // Get Data connection
    require_once('models/PostManager.php');
    require_once('models/CommentManager.php');
    use \Ayman\Blog\Models\PostManager;
    use \Ayman\Blog\Models\CommentManager;
    // Main Functions
    require('includes/functions.php');
    // Controllers
    function showIndex(){
        $postManager = new PostManager();
        $posts = $postManager ->getPosts(); //___models/PostManager.php
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
        $commentsArray = $commentManager->getComments($postId);  //___models/CommentManager.php  
        require('views/postView.php');
    }

    function addComment($postId,$pseudo,$comment){
        $commentManager = new CommentManager();
        $addComment=$commentManager->insertComment($postId,$pseudo,$comment);
        if ($addComment === false) {
            die('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: /?id='.$postId.'&action=Chapitre');
        }
    }