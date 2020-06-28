<?php ob_start();?>
<section class="text-center p-5">
    <div class="not_found d-flex flex-column m-5">
    <img class=" m-auto mt-3 p-md-5 w-50 " src="public/img/404.png" alt="billet_simple_pour_alaska" >
    <h1 class="h1">404</h1>
    <h2 class="h1">Page introuvable</h2>
    <h2 class="h1">Jean Forteroche</h2>
    </div>
</section>
<?php $content = ob_get_clean();?>
<?php require('view/templates/frontend/frontend.php')?>