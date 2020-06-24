<?php ob_start();?>
<div class="container special-color-dark pt-6">
    <div class=" m-auto  p-lg-5">
        <div class='postview'>
            <h1 class="text-center accent-color "><?=$post->_title?></h1>
            <p class="text-center">Publié le <?=$post->_date?></p>
            <?=$post->_content?>
        <div>
            <form class="border border-light p-3 p-lg-5" action="?id=<?=$postId?>&amp;action=addComment" method="post">
                <p class="h4 mb-4 text-left">Commentaire</p>        
                <input class="form-control mb-4" id="defaultContactFormName" type="text" name="pseudo" placeholder="Nom">        
                <textarea class="form-control rounded-0 mb-4" id="exampleFormControlTextarea2" name="comment" placeholder="Commentaire"></textarea>        
                <button class="btn btn-info btn-block" type="submit">Envoyer</button>
            </form>
        </div>
        <?php 
        //PostClass.php
        $post->showPostComments('front');
        ?> 
        </div>
    </div>
</div>
<?php $content = ob_get_clean();?>
<?php require('views/templates/frontend/frontend.php')?>