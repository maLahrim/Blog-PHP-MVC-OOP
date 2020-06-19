<?php
class PostManager extends Manager{
    // All Posts
    public static function getAllPosts(){
        $postsData = self::dbConnect()->query('SELECT * FROM posts');
        $postsArray= $postsData->fetchAll();
        $postsData->closeCursor();
        return $postsArray;
    }
    //Single Post
    public static function getSinglePost($postId)
    {
        $response  = self::dbConnect()->query('SELECT title , created_at , content  FROM posts WHERE id='.$postId.' ');
        $requestedPost = $response->fetch();
        return $requestedPost ;
    }
    public static function totalPostsLenght(){
        $numberOfPosts = self::dbConnect()->query ('SELECT COUNT(*) as total FROM posts');
        $postsLenght = $numberOfPosts->fetch();
        return $postsLenght['total'];
    }
};
