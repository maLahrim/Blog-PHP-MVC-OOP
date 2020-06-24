<?php
class CommentManager extends Manager{
    // request all blog comments from DB
    public static function getAllComments(){
        $request = self::dbConnect()->query('SELECT a.title ,b.* FROM posts a  JOIN comments b ON a.id = b.article_id ORDER BY b.created_at DESC');
        $commentsArray= $request->fetchAll();
        $request ->closeCursor();
        return $commentsArray;
    }
    // request signle Post comments from DB
    public static function getPostComments($postId){
        $request = self::dbConnect()->query('SELECT a.title ,b.* FROM posts a JOIN comments b ON a.id=b.article_id WHERE article_id='.$postId.' ORDER BY created_at DESC ');
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
    public static function signalComment($commentId){
        $request = self::dbConnect()->prepare('UPDATE comments SET  Signalement = :signaled WHERE id = :commentId');
        $request->execute(array(
            'signaled' => '1',
            'commentId' => $commentId,
            ));
        return $request;
    }
    public static function  deleteComment($commentId){
        $request=  self::dbConnect()->query ('DELETE FROM comments WHERE id='.$commentId.'');
        return $request;
    }
}