<?php
class CommentManager extends Manager{
    // request all blog comments from DB
    public static function getAllComments(){
        $request = self::dbConnect()->query('SELECT * FROM comments ORDER BY created_at DESC');
        $commentsArray= $request->fetchAll();
        $request ->closeCursor();
        return $commentsArray;
    }
    // request signle Post comments from DB
    public static function getPostComments($postId){
        $request = self::dbConnect()->query('SELECT * FROM comments  WHERE article_id='.$postId.' ORDER BY created_at DESC ');
        $commentsArray = $request->fetchAll();
        $request ->closeCursor();
        return $commentsArray;
    }
    //il faut filtrer les inputs
    public static function insertComment($postId,$pseudo,$comment){
        $request = self::dbConnect()->prepare('INSERT INTO comments (id,article_id,pseudo,content ) VALUES(?,?,?,?)');
        $newComment = $request->execute(array('',$postId,$pseudo,$comment));
        return $newComment;
    }
}