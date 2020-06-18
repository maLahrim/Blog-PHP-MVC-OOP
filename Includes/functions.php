
<?php
// Header functions
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
        nav_item('/','ACCUEIL',$linkClass,$listClass).
        nav_item('/?action=posts','CHAPITRES',$linkClass,$listClass).
        <<<HTML
        <li><a class="main-logo px-4" href="/" title="JF"> <img  src="/img/logo-white.png" alt="JF"></a></li>
HTML.
        nav_item('/#about-us','A PROPOS',$linkClass,$listClass).
        nav_item('/#contact','CONTACT',$linkClass,$listClass);
    }
// Comments Functions
function showComments($comments){
    $commentsContent = '<div class="border border-light p-3 p-lg-5 mt-3 comment-section">
    <h5 class="accent-color">'.htmlspecialchars($comments['pseudo']).'</h5>
    <p class="comment_date">'.$comments['created_at'].'</p>
    <p class="comment_content m-0">'.htmlspecialchars($comments['content']).'</p>
    </div>';
    echo $commentsContent;
}