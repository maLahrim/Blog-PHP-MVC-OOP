<?php ob_start();?>
<div class="row wow fadeIn">
<!--Grid column-->
    <div class="col-md-6 mb-4">
        <!--Card-->
        <div class="card">
            <!--Card content-->
            <div class="card-body p-0">
            <h2  class="h2 py-2 white-text blue-gradient color-block text-center">CHAPITRES</h2>
                <?php $posts->showAllPosts('back')?>
            </div>
        </div>
        <!--/.Card-->
    </div>
<!--Grid column-->
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body p-0">
                <h2 class="h2 py-2 white-text blue-gradient color-block text-center" >Commentaires</h2>
                    <?php $posts->showAllComments()?>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean();
require('views/templates/backend/dashboard.php');?>