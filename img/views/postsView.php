<?php ob_start();?>
    <div class="container special-color-dark pt-6">
        <div class=" m-auto  p-lg-5">
            <div class="row col-12 m-auto align-items-start">     
            <?php require("views/templates/postsTemplate.php")?>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean();?>
<?php require('views/templates/frontend/FrontEnd.php')?>