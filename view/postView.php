<?php ob_start();?>
<section class="container special-color-dark pt-6">
<h1 class="text-center accent-color mt-5"><?=$post->_title?></h1>
    <div class=" m-auto  p-lg-5 pt-lg-2">
        <article class='postview'>
            <p class="text-center">Publié le <?=$post->_date?></p>
            <?=$post->_content?>
        <div>
            <form class="border border-light p-3 p-lg-5" action="?view=front&action=addComment&id=<?=$post->_id?>" method="post">
                <p class="h4 mb-4 text-left">Commentaire</p>        
                <input class="form-control mb-4" id="defaultContactFormName" type="text" name="pseudo" placeholder="Nom">        
                <textarea class="form-control rounded-0 mb-4" id="exampleFormControlTextarea2" name="comment" placeholder="Commentaire"></textarea>        
                <button class="btn btn-info btn-block" type="submit">Envoyer</button>
            </form>
        </div>
        <?php $post->showPostComments();?> 
        </article>
    </div>
</section>
<?php $content = ob_get_clean();?>
<?php require('view/templates/frontend/frontend.php')?>