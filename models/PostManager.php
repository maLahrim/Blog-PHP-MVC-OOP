<?php
class PostManager extends Manager{
<<<<<<< HEAD
    // fetch all blog posts from DB
    public static function getAllPosts(){
        $request = self::dbConnect()->query('SELECT * FROM posts ORDER BY created_at ASC');
        $postsArray= $request->fetchAll();
        $request->closeCursor();
        return $postsArray;
    }
    //request signle Post from DB
    public static function getSinglePost($postId)
=======
    private $_postId;
    public function __construct($postId=''){
        $this->_postId = $postId;
    }
    public function getPosts()
    {
        return $this->dbConnect()->query('SELECT * FROM posts');
    }
    public function totalPostsLenght(){
        $numberOfPosts = $this->dbConnect()->query ('SELECT COUNT(*) as total FROM posts');
        $postsLenght = $numberOfPosts->fetch();
        return $postsLenght['total'];
    }
    // All Posts
    public function postsLoop(){
        $postsData = $this->getPosts();
        $postsArray= $postsData->fetchAll();
        foreach($postsArray as $post){
            $post['content'] = substr($post['content'], 0, 160).'...';
            require('views/templates/frontend/poststemplate.php');
        };
        $postsData->closeCursor();
    }
    //Single Post
    public function getSinglePost($id)
>>>>>>> parent of d4044a9... Comit before admin
    {
        $response  = $this->dbConnect()->query('SELECT title , created_at , content  FROM posts WHERE id='.$id.' ');
        $requestedPost = $response->fetch();
        return $requestedPost ;
    }
<<<<<<< HEAD
    //request postlenght Post from DB
    public static function totalPostsLenght(){
        $request = self::dbConnect()->query ('SELECT COUNT(*) as total FROM posts');
        $postsLenght = $request->fetch();
        return $postsLenght['total'];
    }
    // insert post
    public static function insertPost($title,$content){
        $request = self::dbConnect()->prepare('INSERT INTO posts (id,title,content,created_at) VALUES(?,?,?,CURRENT_TIMESTAMP)');
        $newComment = $request->execute(array('',$title,$content));
        return $newPost;
    }
    //Delet post
    public static function  deletePost($postId){
        $request=  self::dbConnect()->query ('DELETE FROM posts WHERE id='.$postId.'');
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
=======
};
>>>>>>> parent of d4044a9... Comit before admin
