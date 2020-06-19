<?php
    // Header functions
    function pageTitle($title)
    {
        if (isset($title))
        {
            echo strtoupper($title).' -'.' Blog de Jean Forteroche';} 
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