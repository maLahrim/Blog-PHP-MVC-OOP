<?php
class CommentManager extends Manager{

    public static function getComments($postId){
        $request = self::dbConnect()->query('SELECT * FROM comments WHERE article_id='.$postId.'');
        $commentsArray = $request->fetchAll();
        return $commentsArray;
    }
    public static function commentTemplate($pseudo,$date,$content){
        $commentContent = '<div class="border border-light p-3 p-lg-5 mt-3 comment-section">
        <h5 class="accent-color">'.htmlspecialchars($pseudo).'</h5>
        <p class="comment_date">'.$date.'</p>
        <p class="comment_content m-0">'.htmlspecialchars($content).'</p>
        </div>';
    return $commentContent;
}
    //il faut filtrer les inputs
    public static function insertComment($postId,$pseudo,$comment){
        $dataBase = self::dbConnect();
        $req = $dataBase->prepare('INSERT INTO comments (id,article_id,pseudo,content ) VALUES(?,?,?,?)');
        $newComment = $req->execute(array('',$postId,$pseudo,$comment));
        return $newComment;
    }

}