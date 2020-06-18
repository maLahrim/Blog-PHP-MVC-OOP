<?php 
require_once('controller/controller.php');

if (isset($_GET['action'])) {

    if($_GET['action'] == 'posts') {

        showPosts(); //__controller/controller.php

    }

    elseif ($_GET['action'] == 'Chapitre' AND isset($_GET['id']) ) {

        $postManager = new \Ayman\Blog\Models\PostManager();
        $postsLenght = $postManager->totalPostsLenght();
        $postId= filter_input ( INPUT_GET,'id',FILTER_VALIDATE_INT);

        if(isset($postId) AND is_int($postId) AND $postId <= $postsLenght and $postId > 0 ) {

            showSinglePost($postId); //__controller/controller.php

        }
        else {

            $title = 'Chapitre indisponible';
            echo '<h1 class="text-center accent-color ">Chapitre indiponible</h1>';
        }        
    }
    elseif($_GET['action']== 'addComment' AND isset($_GET['id']) ) {

        $postManager = new \Ayman\Blog\Models\PostManager();
        $postsLenght = $postManager->totalPostsLenght();
        $postId= filter_input ( INPUT_GET,'id',FILTER_VALIDATE_INT);

        if(!empty($_POST['pseudo']) AND !empty($_POST['comment']) AND is_int($postId) AND $postId <= $postsLenght AND $postId > 0) {

        addComment($postId,$_POST['pseudo'],$_POST['comment']); //__controller/controller.php

        }
        else{
            echo "commentaire";
        }
    }
    else {
        // if Get action is set  but have no value or other Chapitre or addComment
        echo "ddd";
        showIndex(); //__controller/controller.php
    }
}
else{
    // if Get action is not set
    showIndex(); //__controller/controller.php
}