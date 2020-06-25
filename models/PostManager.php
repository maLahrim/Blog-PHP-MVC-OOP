<?php
class PostManager extends Manager{
    // fetch all blog posts from DB
    public static function getAllPosts(){
        $request = self::dbConnect()->query('SELECT * FROM posts ORDER BY created_at ASC');
        $postsArray= $request->fetchAll();
        $request->closeCursor();
        return $postsArray;
    }
    //request signle Post from DB
    public static function getSinglePost($postId)
    {
        $response  = self::dbConnect()->query('SELECT title , created_at , content  FROM posts WHERE id='.$postId.' ');
        $requestedPost = $response->fetch();
        return $requestedPost ;
    }
    //request postlenght Post from DB
    public static function totalPostsLenght(){
        $request = self::dbConnect()->query ('SELECT COUNT(*) as total FROM posts');
        $postsLenght = $request->fetch();
        return $postsLenght['total'];
    }
    public static function allPostId($postId){
        $request = self::dbConnect()->query ('SELECT id FROM posts');
        $allPostId = $request->fetchAll();
        $request->closeCursor();
        //var_dump($allPostId);
        foreach($allPostId as $elt){
            if(in_array($postId,$elt)){
                return true;
            }
        }
    }
    // insert post
    public static function insertPost($title,$content){
        $request = self::dbConnect()->prepare('INSERT INTO posts (id,title,content,created_at) VALUES(?,?,?,CURRENT_TIMESTAMP)');
        $newComment = $request->execute(array('',$title,$content));
        return $newComment;
    }
    //Delet post
    public static function  deletePost($postId){
        //relation parent enfant clef etrangére.
        //$request=  self::dbConnect()->query ('DELETE a.* ,b.* FROM posts a JOIN comments b ON a.id = b.article_id WHERE a.id='.$postId.'');
        $request=  self::dbConnect()->query ('DELETE FROM posts WHERE id='.$postId.''); // relation Table posts.id = comments.article_id Delet Cascad
        return $request;
    }
    //update Post
    public static function updateOldPost($postId,$title,$content){
        $request = self::dbConnect()->prepare('UPDATE posts SET title = :newtitle, content = :newcontent WHERE id = :postid');
        $request->execute(array(
            'newtitle' => $title,
            'newcontent' => $content,
            'postid' => $postId
            ));
        return $request;
    }
    
};
