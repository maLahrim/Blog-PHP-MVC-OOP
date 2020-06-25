<?php ob_start();?>
    <article class="container special-color-dark pt-6">
        <div class=" m-auto  p-lg-5">
            <div class="row col-12 m-auto align-items-start">     
            <?php $posts->showAllPosts('front')?>
            </div>
        </div>
    </article>
<?php $content = ob_get_clean();?>
<?php require('view/templates/frontend/frontend.php')?>