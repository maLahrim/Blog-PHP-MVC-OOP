<?php
//frontEnd Controllers
    //Show index view (SELECT posts from DB)
use Controller\PostsClass;
use Controller\SinglePost;
    function renderIndex()
    {
        $title="Accueil";
        $posts = new PostsClass('front'); 
        require('view/indexView.php');
    }

    //Show posts view (SELECT posts from DB)
    function renderPosts()
    {
        $title = 'Chapitres';
        $posts = new PostsClass('front');
        require('view/postsView.php'); 
    }

    //Show signle post view (SELECT post and comments from DB)
    function renderPost($postId)
    {
        $post = new SinglePost();
        $post->showSinglePost($postId,'front');
        $title=$post->_title;
        require('view/postView.php');
    }

    // INSERT  Comment in DB
    function addComment($postId,$pseudo,$comment){
        $post = new SinglePost();
        $post->creatComment($postId,$pseudo,$comment);
    }

    //Update Comment in DB 
    function signal($postId,$commentId){
        $post = new SinglePost();
        $post-> updateComment($postId,$commentId); 

    }

    // Not found function 
    function notFound(){
        $title = "404 - Not Found";
        require('view/templates/common/404.php');
    }
