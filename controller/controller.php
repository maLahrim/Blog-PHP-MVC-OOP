<?php
    require('includes/functions.php');
    require('views/templates/common/commentstemplate.php');
    // Controllers
    function classLoader($classe)
    {
    require 'models/'.$classe . '.php';
    }
    spl_autoload_register('classLoader');
//frontEnd Controllers
    function showIndex()
    {
        $title="Accueil";
        $posts = new PostClass();
        require('views/indexView.php');

    }
    //Show aLL posts 
    function showPosts()
    {
        $title = 'Chapitres';
        $posts = new PostClass();
        require('views/postsView.php');
    }
    //Show signle post
    function showPost($postId)
    {
        $post = new PostClass($postId);
        $post->showSinglePost();
        $title=$post->_title;
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
    function signalctr($postId,$commentId){
        $updatePost = CommentManager::signalComment($commentId);
        if ($updatePost === false) {
            die('Impossible de signaler!');
        }
        else {
            header('Location: /?id='.$postId.'&action=Chapitre');
        }

    }
//Backend Controllers
    function showAdmin(){
        $title = 'administration';
        $posts = new PostClass();        
        require('views/templates/backend/home.php');
    }
    function newPost(){
        $view='newpost';
        $title='Nouveau Chapitre';
        require('views/templates/backend/post.php');
    }
    function editPost($postId){
        $post = new PostClass($postId);
        $post->showSinglePost();
        $title=$post->_title;
        $view='editpost';
        require('views/templates/backend/post.php');
    }
    function insertPost ($title,$content){
        $insertPost=PostManager::insertPost($title,$content);
        if ($insertPost === false) {
            die('Impossible d\'ajouter le chapitre !');
        }
        else {
            header('Location: /?action=admin');
        }
    }
    function deletepost($postId){
        $deletPost = PostManager::deletePost($postId);
        if ($deletPost === false) {
            die('Impossible d\'ajouter le chapitre !');
        }
        else {
            header('Location: /?action=admin');
        }
    }
    function deleteComment($commentId){
        $deletPost = CommentManager::deleteComment($commentId);
        if ($deletPost === false) {
            die('Impossible d\'ajouter le chapitre !');
        }
        else {
            header('Location: /?action=admin');
        }
    }
//Update Post
    function updatePost($postId,$title,$content){
        $updatePost = PostManager::updateOldPost($postId,$title,$content);
        if ($updatePost === false) {
            die('Impossible de mettre à jour !');
        }
        else {
            header('Location: /?action=admin&chapitre='.$postId.'');
        }
    }