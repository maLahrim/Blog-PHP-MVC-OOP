<?php ob_start();?>
<div class="container special-color-dark pt-6">
    <div class=" m-auto  p-lg-5">
        <div>
        <?php require("views/templates/singlePostTemplate.php")?>
        </div>
    </div>
</div>
<?php $content = ob_get_clean();?>
<?php require('views/templates/frontend/frontEnd.php')?>