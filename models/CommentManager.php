<?php
namespace Ayman\Blog\Models;
require_once('models/Manager.php');
class CommentManager extends Manager{

    public function getComments($postId){
        $dataBase = $this->dbConnect();
        $response = $dataBase->query('SELECT * FROM comments WHERE article_id='.$postId.'');
        return $response;
    }
    //il faut filtrer les inputs
    public function insertComment($postId,$pseudo,$comment){
        $dataBase = $this->dbConnect();
        $req = $dataBase->prepare('INSERT INTO comments (id,article_id,pseudo,content ) VALUES(?,?,?,?)');
        $newComment = $req->execute(array('',$postId,$pseudo,$comment));
        return $newComment;
    }

}