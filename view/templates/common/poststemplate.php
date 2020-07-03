<?php
//used in PostClass
function postsTemplate($view, $post)
{
    if ($view=='front') {
        $frontPosts=
        '<div id="'.$post['id'].'" class="col-lg-4 p-0 px-lg-3 pt-3">
            <h3 class="accent-color">'.$post['title'].'</h3>
            <p>'.$post['content'].'</p>
            <p class="text-right">
                <a class="text-right" href="/?view=front&action=chapitre&amp;id='.$post['id'].'">lire plus</a>
            </p>
        </div>';
        return $frontPosts;
    } elseif ($view=='back') {
        $backPosts=
        '<div id="'.$post['id'].'" class="d-flex flex-column back-card p-3 mb-3">
            <div class="d-flex justify-content-between ">
            <h6 class="blue-text" >'.$post['title'].'</h6>
            <p class="blue-text">'.$post['created_at'].'</p>
            </div>
            <div>
            '.$post['content'].'
            </div>
            <div class="d-flex justify-content-between">
                <a href="/?view=admin&chapitre='.$post['id'].'" class="btn btn-warning p-1 ">Modifier</a>
                <a href="/?view=admin&deletePost='.$post['id'].'" type="button" class="btn btn-danger p-1 ">Supprimer</a>
            </div>
        </div>';
        return $backPosts;
    }
}