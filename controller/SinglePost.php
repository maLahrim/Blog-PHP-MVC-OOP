<?php
/*
//Single Post controller 
// Request signle posts based on id + all this post comments
    // front End :
        - Show signle post + comments
        - visitor => signal post
        - visitor => Creat Comment
    //Back End :
        - Show signle post + comments
        - INSERT UPDATE DELETE single Post 
        - DELET comment

*/
class SinglePost {
    public $_post;
    public $_title;
    public $_id;
    public $_content;
    public $_date;
    public $_commentsArray;
    public $_view;

    public function showSinglePost($postId,$view)
    {
        $this->_post = PostManager::getSinglePost($postId);
        $this->_id = $this->_post['id'];
        $this->_title = $this->_post['title'];
        $this->_content = $this->_post['content'];
        $this->_date = $this->_post['created_at'];
        $this->_commentsArray = CommentManager::getPostComments($postId);
        $this->_view = $view;
    }
    public function showPostComments()
    {
        foreach($this->_commentsArray as $comment)
        {
            echo commentsTemplate($this->_view,$comment);
        }
    }
    function insertNewPost($title,$content)
    {
        $insertPost = PostManager::insertPost($title,$content);

        if ($insertPost === false) {
            die('Impossible d\'ajouter le chapitre !');
        }
        else {
            alert('Votre chapitre a bien été publié','/?action=admin');
        }
    }
    
    public function updateThisPost($postId,$title,$content)
    {
        $updatePost = PostManager::updateOldPost($postId,$title,$content);
        if ($updatePost === false) 
        {
            die('Impossible de mettre à jour !');
        }
        else 
        {
            alert('Votre chapitre a bien été mis à jour','/?action=admin&chapitre='.$postId.'');
        }
    }

    function deleteThisPost($postId)
    {
        $deletPost = PostManager::deletePost($postId);
        if ($deletPost === false) 
        {
            die('Impossible de supprimer ce chapitre !');
        }
        else 
        {
            alert('Votre chapitre a bien été supprimé','/?action=admin');
        }
    }

    public function creatComment($postId,$pseudo,$comment)
    {
        $addComment = CommentManager::insertComment($postId,$pseudo,$comment);
        if ($addComment === false) {
            die('Impossible d\'ajouter le commentaire !');
        }
        else {
            alert('Votre commentaire a bien été envoyé ','/?action=chapitre&id='.$postId.'');
        }
    }
    public function updateComment($postId,$commentId)
    {
        $updatePost = CommentManager::signalComment($commentId);
        if ($updatePost === false) 
        {
            die('Impossible de signaler!');
        }
        else 
        {
            alert('Merci d\'avoir signalé ce commentaire','/?action=chapitre&id='.$postId.'');
        }
    }

    function deleteThisComment($commentId)
    {
        $deletPost = CommentManager::deleteComment($commentId);
        if ($deletPost === false) 
        {
            die('Impossible d\'ajouter le chapitre !');
        }
        else 
        {
            alert('Commentaire supprimé','/?action=admin');
        }
    }
}