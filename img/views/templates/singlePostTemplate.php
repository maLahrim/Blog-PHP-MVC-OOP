<?php
/**********il faut filtrer les inputs***********/
    echo 
        '<h1 class="text-center accent-color ">'.$singlePost['title'].'</h1>
        <p class="pb-5 text-center">Publié le '.$singlePost['created_at'].'</p>
        <p class="pb-5">'.$singlePost['content'].'</p>
        <div>
        <form class="border border-light p-3 p-lg-5" action="?id='.$postId.'&amp;action=addComment" method="post">
        
            <p class="h4 mb-4 text-left">Commentaire</p>        
            <input class="form-control mb-4" id="defaultContactFormName" type="text" name="pseudo" placeholder="Nom">        
            <textarea class="form-control rounded-0 mb-4" id="exampleFormControlTextarea2" name="comment" placeholder="Commentaire"></textarea>        
            <button class="btn btn-info btn-block" type="submit">Envoyer</button>
        </form>
        </div>';
//loop post comments Comments
    while($comments = $commentsArray->fetch())
    {
    echo 
        '<div class="border border-light p-3 p-lg-5 mt-3 comment-section">
            <h5 class="accent-color">'.htmlspecialchars($comments['pseudo']).'</h5>
            <p class="comment_date">'.$comments['created_at'].'</p>
            <p class="comment_content m-0">'.htmlspecialchars($comments['content']).'</p>
        </div>';
    }
    $commentsArray->closeCursor();
