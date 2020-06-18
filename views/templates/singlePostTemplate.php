<?php showArticle($singlePost) //___includes/fonctions.php ?> 
<div>
    <form class="border border-light p-3 p-lg-5" action="?id=<?=$postId?>&amp;action=addComment" method="post">
        <p class="h4 mb-4 text-left">Commentaire</p>        
        <input class="form-control mb-4" id="defaultContactFormName" type="text" name="pseudo" placeholder="Nom">        
        <textarea class="form-control rounded-0 mb-4" id="exampleFormControlTextarea2" name="comment" placeholder="Commentaire"></textarea>        
        <button class="btn btn-info btn-block" type="submit">Envoyer</button>
    </form>
</div>
<?php
    //loop post comments Comments
    while($comments = $commentsArray->fetch())
    {
    showComments($comments); //___includes/fonctions.php
    }
    $commentsArray->closeCursor();
?>
