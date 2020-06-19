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
        $posts = new AllPosts(); //___models/PostManager.php
        require('views/indexView.php');
    }

    function showPosts(){
        $title = 'Chapitres';
        //get all posts
        $posts = new AllPosts();
        require('views/postsView.php');
    }

    function showSinglePost($postId){
        $SinglePost = new SinglePost($postId);
        $article = $SinglePost ->showArticle($postId);
        $title = $SinglePost->title();
        $showComments = new ShowComments($postId);
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

