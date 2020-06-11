
<?php
// Header functions
    function pageTitle($title)
    {
        if (isset($title))
        {
            echo $title.' -'.' Blog de Jean Forteroche';} 
        else 
        {
            echo 'Blog de Jean Forteroche';;
        }
    }
//Menu Functions
    function nav_item(string $url,string $link,string $linkClass,string $listClass):string
    {
        if($_SERVER['REQUEST_URI'] == $url ){
            $listClass .= ' active';
        }
        return 
            <<<HTML
            <li class="$listClass">
                <a class="$linkClass" href="$url">$link</a>
            </li>
HTML;
    }
    
    function nav_menu(string $listClass="",string $linkClass="" ):string
    {
        return 
        nav_item('/blog/','ACCUEIL',$linkClass,$listClass).
        nav_item('/blog/?action=posts','CHAPITRES',$linkClass,$listClass).
        <<<HTML
        <a class="main-logo px-4" href="/blog/" title="JF"> <img  src="/blog/img/logo-white.png" alt="JF"> </a>
HTML.
        nav_item('/blog/#about-us','A PROPOS',$linkClass,$listClass).
        nav_item('/blog/#contact','CONTACT',$linkClass,$listClass);
    }
