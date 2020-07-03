<?php
// used in PostCLass
function commentsTemplate($view, $comment)
{
    if ($view=='front') {
        $frontComments =
    '<div id="'.$comment['id'].'" class="border border-light p-3 p-lg-5 mt-3 comment-section">
        <h5 class="accent-color">'.htmlspecialchars($comment['pseudo']).'</h5>
        <p class="comment_date d-flex align-items-center ">
            <span class="mr-2">'.$comment['created_at'].'</span>
            <a class="text-danger " href="?view=front&action=chapitre&id='.$comment['article_id'].'&signaler='.$comment['id'].'">signaler</a>
        </p>
        <p class="comment_content m-0">'.htmlspecialchars($comment['content']).'</p>
    </div>';
        return $frontComments;
    } elseif ($view=='back') {
        $backComments =
        '   <div id="'.$comment['id'].'" class="back-card p-2">
                <p class=" text-center h5">'.$comment['content'].'</p>
                <p class="text-center d-flex justify-content-around align-items-center ">
                    <span>'.$comment['title'].'</span>
                    <span>Par: '.$comment['pseudo'].'</span>
                    <span>'.$comment['created_at'].'</span>
                    <a href="/?view=admin&deleteComment='.$comment['id'].'" type="button" class="btn btn-danger p-1 ">Supprimer</a>
                </p>
            </div>';
        return $backComments;
    } elseif ($view=='signaled') {
        $signaledComments=
        '   <div id="'.$comment['id'].'" class=" back-card p-2">
            <p class="text-center h5">'.$comment['content'].'</p>
                <p class="text-center d-flex justify-content-around align-items-center ">
                    <span class="text-danger" >'.$comment['title'].'</span>
                    <span class="text-danger" >Par: '.$comment['pseudo'].'</span>
                    <span class="text-danger" >'.$comment['created_at'].'</span>
                    <a href="/?view=admin&deleteComment='.$comment['id'].'" type="button" class="btn btn-danger p-1 ">Supprimer</a>
                </p>
            </div>';
        return $signaledComments;
    }
}
