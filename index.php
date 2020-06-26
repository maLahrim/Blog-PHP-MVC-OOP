<?php 
require_once('controller/autoloader.php');

if (!isset($_GET['action'])) 
{  
    renderIndex();
}
else
{
    switch (true) 
    {
        case $_GET['action'] == 'posts' :
            renderPosts();
            break;

        case $_GET['action'] == 'chapitre' AND isset($_GET['id']) :
            $postId= filter_input ( INPUT_GET,'id',FILTER_VALIDATE_INT);
            if(ispost($postId)) 
            {   //filter if post exist => includes/functions.php
                if(!isset($_GET['signaler']))
                { 
                    renderPost($postId);
                }
                else
                {
                    $commentId= filter_input ( INPUT_GET,'signaler',FILTER_VALIDATE_INT);
                    if(commentsFilter($postId,$commentId))
                    { //if comments belongs to the same post => includes/functions.php
                        signal($postId,$commentId);
                    }
                    else{
                        alert('impossible de signaler ce commentaire','/?action=chapitre&id='.$postId.'');
                    }
                }
            }
            else 
            {
                notFound();
            }
            break;

        case $_GET['action']== 'addComment' AND isset($_GET['id']) :
            $postId = filter_input ( INPUT_GET,'id',FILTER_VALIDATE_INT);
            if(ispost($postId) AND !empty($_POST['pseudo']) AND !empty($_POST['comment'])) 
            {
                // Filter $_POST inputs //=>includes/functions.php
                $pseudo = inputPostFilter('pseudo'); 
                $comment = inputPostFilter('comment');
                if($pseudo AND $comment)
                {
                    addComment($postId,$pseudo,$comment);
                }
                else
                {
                    alert('Impossible d\'ajouter ce commentaire','/?action=chapitre&id='.$postId.'');
                }
            }
            else
            {
                alert('Veuillez remplire tous les champs','/?action=chapitre&id='.$postId.'');
            }
        break;

        case $_GET['action']== 'admin' :    
            $user = Manager::getUser();
            session_start();

            if(!empty($_POST['email']) AND !empty($_POST['password']))
            {
            $_SESSION['email']= $_POST['email'];
            $_SESSION['password']= $_POST['password'];
            }
            
            if(!empty($_SESSION['email']) AND !empty($_SESSION['password'])
                AND $_SESSION['email']==$user['user'] 
                AND password_verify($_SESSION["password"],$user['password']))
            {
                switch(true)
                {
                    case isset($_GET['chapitre']) AND !isset($_GET['db']) :
                        $postId= filter_input ( INPUT_GET,'chapitre',FILTER_VALIDATE_INT);
                        editPost($postId);
                        break;

                    case isset($_GET['db']) :
                        $postId= filter_input ( INPUT_GET,'chapitre',FILTER_VALIDATE_INT);
                        $newTitle = $_POST['title'];
                        $newContent=$_POST['content'];
                        updatePost($postId,$newTitle,$newContent);
                        break;

                    case isset($_GET['newPost']):
                        newPost();
                        break;

                    case isset($_GET['insertPost']):
                        $postTitle = $_POST['title'];
                        $postContent=$_POST['content'];
                        creatPost($postTitle,$postContent); 
                        break;

                    case isset($_GET['deletePost']) :
                        deletePost($_GET['deletePost']);
                        break;

                    case isset($_GET['deleteComment']):
                        $commentId= filter_input ( INPUT_GET,'deleteComment',FILTER_VALIDATE_INT);
                        deleteComment($commentId);
                        break;

                    default:
                        renderAdmin();
                        break;
                }
            }
            else
            {
                require('view/templates/backend/login.php');
            }
            break;

        case $_GET['action']== 'logout' :
            session_start();
            $_SESSION = array();
            header('Location: ?action=admin');
            break;
    
        default :
            renderIndex();
            break;               
    }
}