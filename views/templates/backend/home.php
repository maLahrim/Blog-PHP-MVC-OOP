<?php ob_start();?>
<div class="row wow fadeIn">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <?php $posts->showAllPosts('back')?>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="blue lighten-4">
                        <tr>
                            <th>Chapitres</th>
                            <th>Pseudo</th>
                            <th>Commentaire</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php $posts->showAllComments()?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean();
require('views/templates/backend/dashboard.php');?>