<?php
    require('includes/functions.php');
    // Controllers
    function classLoader($classe)
    {
    require 'models/'.$classe . '.php';
    }

    spl_autoload_register('classLoader');

    function showIndex(){
        $title = 'ACCEUIL';
        $posts = new PostManager(); //___models/PostManager.php
        require('views/indexView.php');
    }

    function showPosts(){
        $title = 'Chapitres';
        //get all posts
        $posts = new PostManager();
        require('views/postsView.php');
    }

    function showSinglePost($postId){
        $singlePost = new PostManager($postId);
        $article = $singlePost ->getSinglePost($postId);
        $title = $article['title'];
        $showComments = new CommentManager($postId);
        require('views/postView.php');
    }

    function addComment($postId,$pseudo,$comment){
        $commentManager = new CommentManager($postId);
        $addComment=$commentManager->insertComment($pseudo,$comment);
        if ($addComment === false) {
            die('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: /?id='.$postId.'&action=Chapitre');
        }
    }