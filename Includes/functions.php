<?php
// Header functions
use \Ayman\Blog\Models\PostManager;
use \Ayman\Blog\Models\CommentManager;
    function pageTitle($title)
    {
        if (isset($title))
        {
            echo $title.' -'.' Blog de Jean Forteroche';} 
        else 
        {
            echo 'Blog de Jean Forteroche';
        }
    }
//Menu Functions
    function nav_item(string $link,string $url,string $listClass="",string $linkClass=""):string
    {
        if($_SERVER['REQUEST_URI'] == $url ){
            $listClass .= ' active';
        }
        $newLink = '<li class="'.$listClass.'">
        <a class="'.$linkClass.'" href="'.$url.'">'.$link.'</a>
        </li>';
        
        return $newLink;
    }
    function nav_menu($logoLink ="")
    {
        if($logoLink !=""){
            $logo ='<li><a class="main-logo px-4" href="/" title="JF"> <img  src="'.$logoLink.'" alt="JF"></a></li>';
        }else{
            $logo='';
        }
        return
        nav_item('ACCUEIL','/','nav-item','nav-link').
        nav_item('CHAPITRES','/?action=posts','nav-item','nav-link').
        $logo.
        nav_item('A PROPOS','/#about-us','nav-item','nav-link').
        nav_item('CONTACT','/#contact','nav-item','nav-link');
    }
    //Articles Functions
    //get All Post
    class AllPosts extends PostManager{
        private $_postsData; 
        private  $_postsArray;
        public function __construct(){
            $this->_postsData = $this->getPosts(); 
            $this->_postsArray= $this->_postsData->fetchAll();
        }
        public function showArticles($post){
            //il faut filtrer les output
            $post['content'] = substr($post['content'], 0, 160).'...';
            $postContent = '<div class="col-lg-4 p-0 px-lg-3 pt-3">
                <h3 class="accent-color">'.$post['title'].'</h3>
                <p>'.$post['content'].'</p>
                <p class="text-right">
                    <a class="text-right" href="/?id='.$post['id'].'&amp;action=Chapitre">lire plus</a>
                </p>
            </div>';
            return $postContent;
        }
        public function postsLoop(){
            foreach($this->_postsArray as $post){
                echo $this->showArticles($post);
            };
            $this->_postsData->closeCursor();
        }
    }
    //get One Post
    class SinglePost extends PostManager{
        private $_postId;
        private $_singlePostData; 
        public function __construct($postId){
            $this->_postId = $postId;
            $this->_singlePostData = $this->getSinglePost($this->_postId);
            
        }
        public function showArticle(){
            $singlePost = 
            ' <h1 class="text-center accent-color ">'.$this->_singlePostData['title'].'</h1>
            <p class="pb-5 text-center">Publié le '.$this->_singlePostData['created_at'].'</p>
            <p class="pb-5">'.$this->_singlePostData['content'].'</p>';
            return $singlePost;
        }
        public function title(){
            return $this->_singlePostData['title'];
        }
    }

    class ShowComments extends CommentManager{
        private  $_postComments ;
        private  $_commentsArray;
        private  $_pseudo;
        private  $_content;
        public function __construct($postId){
            $this->_postComments = $this->getComments($postId);
            $this->_commentsArray = $this->_postComments->fetchAll();
        }
        public function showComment($comment){
            $commentContent = '<div class="border border-light p-3 p-lg-5 mt-3 comment-section">
            <h5 class="accent-color">'.htmlspecialchars($comment['pseudo']).'</h5>
            <p class="comment_date">'.$comment['created_at'].'</p>
            <p class="comment_content m-0">'.htmlspecialchars($comment['content']).'</p>
            </div>';
        return $commentContent;
    }
        public function commentsLoop(){
            foreach($this->_commentsArray as $comment){
                echo $this->showComment($comment);
            };
            $this->_postComments->closeCursor();
        }
        /*ajouter asseceur et mutateur*/
    }
