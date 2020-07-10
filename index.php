<?php
// Auto Load
require_once('includes/autoloader.php');
spl_autoload_register('myAutoLoader');
// select the view
if (!isset($_GET['view']))                                        // now view render index (default router )
{  
    renderIndex();
}
else
{
    if($_GET['view'] =='front' AND isset($_GET['action']))   // if view  is front init the front switch function line 32 index.php
    {
        frontEndSwitch();
    }
    elseif($_GET['view'] =='admin')                         // if view  is front init the back switch function line 93 index.php
    {       
        if(loginCheck())
        {
            backEndSwitch();
        }
        else
        {   
            require('view/templates/backend/login.php');
        }
    }
    else
    {
        notFound();  
    }
}
function frontEndSwitch(){                          // depending on the action the front switch will filter inputs and call the required controllers 
    switch (true)                                       
    {
        case$_GET['action'] == 'posts'  :          // Parent Front end controler in controller/frontend.php 
            renderPosts();
        break;

        case$_GET['action'] == 'chapitre' AND isset($_GET['id']) :
            $postId= filter_input ( INPUT_GET,'id',FILTER_VALIDATE_INT);
            if(ispost($postId)) //filter if post exist => includes/functions.php
            { 
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
                    else
                    {
                        alert('impossible de signaler ce commentaire','/?view=front&action=chapitre&id='.$postId.'');
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
                    alert('Impossible d\'ajouter ce commentaire','/?view=front&action=chapitre&id='.$postId.'');
                }
            }
            else
            {
                alert('Veuillez remplire tous les champs','/?view=front&action=chapitre&id='.$postId.'');
            }
        break;

        default:
            renderIndex();
        break;
    }
};
function backEndSwitch(){             // Parent Back end controler in controller/backend.php 
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

        case isset($_GET['action']) AND $_GET['action'] == 'logout' :
            session_start();
            $_SESSION = array();
            header('Location: /?view=admin');
            break;

        default:
            renderAdmin();
            break;
    }
};
function loginCheck(){

    $user = Model\Manager::getUser();
    session_start();
    if(isset($_POST['email']) AND isset($_POST['password']))
    {
        $postUser = htmlspecialchars($_POST['email']);
        $postPassword = htmlspecialchars($_POST['password']);
        $hashCheck = password_verify($postPassword,$user['password']);

        if($postUser == $user['user'] AND $hashCheck)
        {
            $_SESSION['email']= $postUser;
            $_SESSION['password']= $_POST['password'];
            return true;
        }
        else
        {
            alert('Identifiant incorrect','/?view=admin');
            return false;
        };
    }
    elseif(isset($_SESSION['email']) AND isset($_SESSION['password']) AND $_SESSION['email'] == $user['user'] 
    AND password_verify($_SESSION['password'],$user['password']))
    {
        return true;
    }
    
};