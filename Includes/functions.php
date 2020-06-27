<?php
    // Header functions
    function pageTitle($title)
    {
        if (isset($title))
        {
            return strtoupper($title).' - Blog de Jean Forteroche';} 
        else 
        {
            return 'Blog de Jean Forteroche';
        }
    }
    //Menu Functions
    function nav_item(string $link,string $url,string $listClass="",string $linkClass=""):string
    {
        if($_SERVER['REQUEST_URI'] == $url )
        {
            $listClass .= ' active';
        }
        $newLink = '<li class="'.$listClass.'">
        <a class="'.$linkClass.'" href="'.$url.'">'.$link.'</a>
        </li>';
        return $newLink;
    }
    function nav_menu($logoLink ="")
    {
        if($logoLink !="")
        {
            $logo ='<li><a class="main-logo px-4" href="/" title="JF"> <img  src="'.$logoLink.'" alt="JF"></a></li>';
        }
        else
        {
            $logo='';
        }
        return
        nav_item('ACCUEIL','/','nav-item','nav-link').
        nav_item('CHAPITRES','/?view=front&action=posts','nav-item','nav-link').
        $logo.
        nav_item('A PROPOS','/#about-us','nav-item','nav-link').
        nav_item('CONTACT','/#contact','nav-item','nav-link');
    }
    //
    function alert($msg,$link){
        echo "
        <script type='text/javascript'>
        alert(\"$msg\")
        window.location = \"$link\";
        </script>";
    }
    //filter functions
    function ispost($postId)
    {
        $allPostId= PostManager::allPostId();
        foreach($allPostId as $elt)
        {
            if(in_array($postId,$elt))
            {
                return true;
            }
        }
    }
    function commentsFilter($postId,$commentId)
    {
        $postCommentsId= CommentManager::postCommentsId($postId);
        foreach($postCommentsId as $elt)
        {
            if(in_array($commentId,$elt))
            {
                return true;
            }
        }
    }
    function inputPostFilter($key){
        $input = 
            filter_var(
                $_POST[$key],
                FILTER_VALIDATE_REGEXP,
                array("options" => array("regexp"=>"#^[a-zA-Z0-9\",.!?@_ ]*$#"))
            );
        return $input;
    }
    /*
    function inputPostFilter($key){
        $input = preg_replace('/[^A-Za-z0-9\-?!]/', ' ', $_POST[$key]);
         return $input;
    }
    */
