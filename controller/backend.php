<?php
//Backend Controllers
    //show Admin (Read posts and comments)
    use Controller\PostsClass;
    use Controller\SinglePost;
    function renderAdmin()
    {
        $title = 'Administration';
        $posts = new PostsClass('back');        
        require('view/templates/backend/home.php');
    }
    // Show Creat new post view
    function newPost()
    {
        $template='newpost';
        $title='Nouveau Chapitre';
        require('view/templates/backend/post.php');
    }
    // INSERT post in DB
    function creatPost($title,$content)
    {
        $newPost = new SinglePost();
        $newPost->insertNewPost($title,$content);
    }
    //Show update new post view
    function editPost($postId)
    {
        $post = new SinglePost();
        $post->showSinglePost($postId,"back");
        $title=$post->_title;
        $template='editpost';
        require('view/templates/backend/post.php');
    }
    // UPDATE post in DB (title and content)
    function updatePost($postId,$title,$content)
    {
        $post = new SinglePost();
        $post->updateThisPost($postId,$title,$content);
    }
    // DELETE post from DB
    function deletePost($postId)
    {
        $post = new SinglePost();
        $post->deleteThisPost($postId);
    }
      // DELETE Comment from DB
    function deleteComment($commentId)
    {
        $post = new SinglePost();
        $post->deleteThisComment($commentId);
    }
