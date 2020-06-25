<?php
    require('includes/functions.php');
    require('view/templates/common/commentstemplate.php');
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
        require('view/indexView.php');
    }
    //Show aLL posts 
    function showPosts()
    {
        $title = 'Chapitres';
        $posts = new PostClass();
        require('view/postsView.php');
    }
    //Show signle post
    function showPost($postId)
    {
        $post = new PostClass($postId);
        $post->showSinglePost();
        $title=$post->_title;
        require('view/postView.php');
    }

    function addComment($postId,$pseudo,$comment){
        $commentManager = new CommentManager();
        $addComment=$commentManager->insertComment($postId,$pseudo,$comment);
        if ($addComment === false) {
            die('Impossible d\'ajouter le commentaire !');
        }
        else {
            echo "
            <script type='text/javascript'>
            alert(\"Votre commentaire a bien été envoyé \")
            window.location = \"/?id=$postId&action=Chapitre\";
            </script>";
        }
    }
    function signalctr($postId,$commentId){
        $updatePost = CommentManager::signalComment($commentId);
        if ($updatePost === false) {
            die('Impossible de signaler!');
        }
        else {
            echo "
            <script type='text/javascript'>
            alert(\"merci d'avoir signalé se commentaire\")
            window.location = \"/?id=$postId&action=Chapitre\";
            </script>";
        }
    }
//Backend Controllers
    function showAdmin(){
        $title = 'administration';
        $posts = new PostClass();        
        require('view/templates/backend/home.php');
    }
    function newPost(){
        $view='newpost';
        $title='Nouveau Chapitre';
        require('view/templates/backend/post.php');
    }
    function editPost($postId){
        $post = new PostClass($postId);
        $post->showSinglePost();
        $title=$post->_title;
        $view='editpost';
        require('view/templates/backend/post.php');
    }
    function insertPost ($title,$content){
        $insertPost=PostManager::insertPost($title,$content);
        if ($insertPost === false) {
            die('Impossible d\'ajouter le chapitre !');
        }
        else {
            echo "
            <script type='text/javascript'>
            alert(\"Votre chapitre a bien été publié\")
            window.location = \"/?action=admin\";
            </script>";
        }
    }
    function deletepost($postId){
        $deletPost = PostManager::deletePost($postId);
        if ($deletPost === false) {
            die('Impossible d\'ajouter le chapitre !');
        }
        else {
            echo "
            <script type='text/javascript'>
            alert(\"Votre chapitre a bien été supprimé\")
            window.location = \"/?action=admin\";
            </script>";
        }
    }
    function deleteComment($commentId){
        $deletPost = CommentManager::deleteComment($commentId);
        if ($deletPost === false) {
            die('Impossible d\'ajouter le chapitre !');
        }
        else {
            echo "
            <script type='text/javascript'>
            alert(\"Commentaire supprimé\")
            window.location = \"/?action=admin\";
            </script>";
        }
    }
//Update Post
    function updatePost($postId,$title,$content){
        $updatePost = PostManager::updateOldPost($postId,$title,$content);
        if ($updatePost === false) {
            die('Impossible de mettre à jour !');
        }
        else {
            echo "
            <script type='text/javascript'>
            alert(\"Votre chapitre a bien été mis à jour\")
            window.location = \"/?action=admin&chapitre=$postId\";
            </script>";
        }
    }
    // not fount function 
    function notFound(){
        $title = "404 - Not Found";
        require('view/templates/common/404.php');
    }