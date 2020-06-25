<?php ob_start();?>
<section class="text-center p-5">
    <div id="not_found" class="m-5 ">
    <h1 class="h1">404</h1>
    <h2 class="h1">Page not found</h2>
    <p>The Page you are looking for doesn't exist or an other error eccured.</p>
    <p>Go back, or ahead over to example.com to choose a new direction.</p>
    </div>
</section>
<?php $content = ob_get_clean();?>
<?php require('view/templates/frontend/frontend.php')?>