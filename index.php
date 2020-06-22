<?php 
require_once('controller/controller.php');

if (!isset($_GET['action'])) 
{  
    showIndex();
}
else
{
    if($_GET['action'] == 'posts') {
        showPosts();
    }
    elseif ($_GET['action'] == 'Chapitre' AND isset($_GET['id']))
    {
        $postManager = new PostManager();
        $postsLenght = $postManager::totalPostsLenght();
        $postId= filter_input ( INPUT_GET,'id',FILTER_VALIDATE_INT);

        if(isset($postId) AND is_int($postId) AND $postId <= $postsLenght and $postId > 0 ) 
        {
            showPost($postId); //__controller/controller.php
        }
        else 
        {
            $title = 'Chapitre indisponible';
            echo '<h1 class="text-center accent-color ">Chapitre indiponible</h1>';
        }        
    }
    elseif($_GET['action']== 'addComment' AND isset($_GET['id']) ) 
    {
        $postManager = new PostManager();
        $postsLenght = $postManager::totalPostsLenght();
        $postId= filter_input ( INPUT_GET,'id',FILTER_VALIDATE_INT);
        if(!empty($_POST['pseudo']) AND !empty($_POST['comment']) AND is_int($postId) AND $postId <= $postsLenght AND $postId > 0) 
        {
        addComment($postId,$_POST['pseudo'],$_POST['comment']);
        }
        else
        {
            echo "commentaire";
        }
    }
    //backend
    elseif($_GET['action']== 'admin'){
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
        elseif(isset($_GET['delete']))
        {
            deletePost($_GET['delete']);
        }
        else
        {
            showAdmin();
        }
    }
    else {
        showIndex();
    }
}

