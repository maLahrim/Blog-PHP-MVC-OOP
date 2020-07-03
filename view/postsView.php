<?php ob_start();?>
    <article class="container d-flex flex-column justify-content-center special-color-dark pt-6">
    <img class=" m-auto mt-3 p-md-5 w-50  " src="public/img/Billet-Simple-Pour-Alaska.png" alt="billet_simple_pour_alaska" >
        <div class=" m-auto  p-lg-5">
            <div class="row col-12 m-auto align-items-start">     
                <?php $posts->showAllPosts()?>
            </div>
        </div>
    </article>
<?php $content = ob_get_clean();?>
<?php require('view/templates/frontend/frontend.php')?>