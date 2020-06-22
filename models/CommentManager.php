<?php
class CommentManager extends Manager{
<<<<<<< HEAD
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
=======
    private $_postId;
    public function __construct($postId){
        $this->_postId = $postId;
    }
    public function getComments($postId){
        $dataBase = $this->dbConnect();
        $response = $dataBase->query('SELECT * FROM comments WHERE article_id='.$postId.'');
        return $response;
    }
    public function commentsLoop(){
        $postComments = $this->getComments($this->_postId);
        $commentsArray = $postComments->fetchAll();
        foreach($commentsArray as $comment){
            echo $this->showComment($comment);
        };
        $postComments->closeCursor();
    }
    public function showComment($comment){
        $commentContent = '<div class="border border-light p-3 p-lg-5 mt-3 comment-section">
        <h5 class="accent-color">'.htmlspecialchars($comment['pseudo']).'</h5>
        <p class="comment_date">'.$comment['created_at'].'</p>
        <p class="comment_content m-0">'.htmlspecialchars($comment['content']).'</p>
        </div>';
    return $commentContent;
}
    //il faut filtrer les inputs
    public function insertComment($pseudo,$comment){
        $dataBase = $this->dbConnect();
        $req = $dataBase->prepare('INSERT INTO comments (id,article_id,pseudo,content ) VALUES(?,?,?,?)');
        $newComment = $req->execute(array('',$this->_postId,$pseudo,$comment));
>>>>>>> parent of d4044a9... Comit before admin
        return $newComment;
    }
}