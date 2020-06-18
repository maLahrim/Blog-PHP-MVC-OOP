
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
//Articles Functions
    //Show AllPosts
function showArticles($articles){
    //il faut filtrer les output
    $articles['content'] = substr($articles['content'], 0, 160).'...';
    $aticlesArray = '<div class="col-lg-4 p-0 px-lg-3 pt-3">
        <h3 class="accent-color">'.$articles['title'].'</h3>
        <p>'.$articles['content'].'</p>
        <p class="text-right">
            <a class="text-right" href="/?id='.$articles['id'].'&amp;action=Chapitre">lire plus</a>
        </p>
    </div>';
    echo $aticlesArray;
}
    //Show One Post
function showArticle($singlePost){
    $article = 
    ' <h1 class="text-center accent-color ">'.$singlePost['title'].'</h1>
    <p class="pb-5 text-center">Publié le '.$singlePost['created_at'].'</p>
    <p class="pb-5">'.$singlePost['content'].'</p>';
    echo $article;
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