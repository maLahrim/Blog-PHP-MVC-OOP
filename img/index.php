<?php 
require_once('controller/controller.php');
if (isset($_GET['action'])) {
    if($_GET['action'] == 'posts') {
        showPosts();
    }
    elseif ($_GET['action'] == 'Chapitre' AND isset($_GET['id']) ) {
        $postManager = new \Ayman\Blog\Models\PostManager();
        $postsLenght = $postManager->totalPostsLenght();
        $postId= filter_input ( INPUT_GET,'id',FILTER_VALIDATE_INT);
        if(isset($postId) AND is_int($postId) AND $postId <= $postsLenght and $postId > 0 ) {
            showSinglePost($postId);
        }
        else{
            $title = 'Chapitre indisponible';
            echo '<h1 class="text-center accent-color ">Chapitre indiponible</h1>';
        }        
    }
    elseif($_GET['action']== 'addComment' AND isset($_GET['id']) ) {
        $postManager = new \Ayman\Blog\Models\PostManager();
        $postsLenght = $postManager->totalPostsLenght();
        $postId= filter_input ( INPUT_GET,'id',FILTER_VALIDATE_INT);
        if(!empty($_POST['pseudo']) AND !empty($_POST['comment']) AND is_int($postId) AND $postId <= $postsLenght AND $postId > 0) {
        addComment($postId,$_POST['pseudo'],$_POST['comment']);
        }
        else{
            echo "commentaire";
        }
    }
    else {
        echo "ddd";
        var_dump($_POST);
        showIndex();
    }
}
else{
    showIndex();
    var_dump($_POST);
}