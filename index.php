<?php 
require_once('controller/controller.php');
require_once('controller/PostClass.php');
if (!isset($_GET['action'])) 
{  
    showIndex();
}
else
{
    if($_GET['action'] == 'posts') 
    {
        showPosts();
    }
    elseif ($_GET['action'] == 'Chapitre' AND isset($_GET['id']))
    {       
        $postId= filter_input ( INPUT_GET,'id',FILTER_VALIDATE_INT);
        $checkId= PostManager::allPostId($postId);
        //var_dump($checkId);
        if(isset($postId) AND is_int($postId)AND $checkId AND $postId > 0 ) 
        {
             //__controller/controller.php
            if(!isset($_GET['signaler'])){
                showPost($postId);
            }else{
                $commentId = filter_input ( INPUT_GET,'signaler',FILTER_VALIDATE_INT);
                echo"
                <script type=text/javascript >
                alert('Commentaire signalé');
                </script> 
                ";
                signalctr($postId,$commentId);
            }
        }
        else 
        {
            $title = 'Chapitre indisponible';
            echo '<h1 class="text-center accent-color ">Chapitre indiponible</h1>';
        }        
    }
    elseif($_GET['action']== 'addComment' AND isset($_GET['id']) ) 
    {
        $postId= filter_input ( INPUT_GET,'id',FILTER_VALIDATE_INT);
        $checkId= PostManager::allPostId($postId);
        if(!empty($_POST['pseudo']) AND !empty($_POST['comment']) AND is_int($postId) AND $checkId AND $postId > 0) 
        {
        addComment($postId,$_POST['pseudo'],$_POST['comment']);
        }
        else
        {
            echo "commentaire";
        }
    }
    //backend
    elseif($_GET['action']== 'admin')
    {   
        session_start();
        if(!empty($_POST['email']) AND !empty($_POST['password'])){
        $_SESSION['email']= $_POST['email'];
        $_SESSION['password']= $_POST['password'];
        }
        if(!empty($_SESSION['email']) AND !empty($_SESSION['password'])AND $_SESSION['email']=='a@a.fr' AND $_SESSION['password']='1234' )
        {
            if(isset($_GET['chapitre']) AND !isset($_GET['db']) )
            {
                $postId= filter_input ( INPUT_GET,'chapitre',FILTER_VALIDATE_INT);
                editPost($postId);
            }
            elseif( isset($_GET['db']) )
            {
                $postId= filter_input ( INPUT_GET,'chapitre',FILTER_VALIDATE_INT);
                updatePost($postId,$_POST['title'],$_POST['content']);
            }
            elseif(isset($_GET['newPost']))
            {
                newPost();
            }
            elseif(isset($_GET['insertPost']))
            {
                insertPost($_POST['title'],$_POST['content']); 
            }
            elseif(isset($_GET['deletePost']))
            {
                deletePost($_GET['deletePost']);
            }
            elseif(isset($_GET['deleteComment']))
            {
                deleteComment($_GET['deleteComment']);
            }
            else
            {
                showAdmin();
            }
        }else{
            require('views/templates/backend/login.php');
        }
    }
    elseif($_GET['action']== 'logout')
    {
        session_start();
        $_SESSION = array();
        header('Location: ?action=admin');
    }
    else {
        showIndex();
    }
}

