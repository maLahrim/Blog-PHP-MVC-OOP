<?php
    require('includes/functions.php');
    // Controllers
    function classLoader($classe)
    {
    require 'models/'.$classe . '.php';
    }
    spl_autoload_register('classLoader');
    function showIndex()
    {
        $title = 'ACCEUIL';
        $posts = new PostClass();
        require('views/indexView.php');
    }

    function showPosts()
    {
        $title = 'Chapitres';
        $posts = new PostClass();
        require('views/postsView.php');
    }
    function showSinglePost($postId)
    {
        $post = new PostClass($postId);
        $post->showPost();
        $title=$post->_title;
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