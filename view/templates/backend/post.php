
<?php
    if($template=='newpost'){
        $content = '
        <form class="border border-light p-md-2 p-lg-5" action="?view=admin&insertPost" method="post">
            <h4 class="h4">Titre</h4>
            <input type="text" id="defaultContactFormName" class="post-edition form-control mb-4" placeholder="Titre" name="title"></input>
            <div class="form-group">
                <h5 class="h5">Contenu</h5>
                <textarea class="form-control rounded-0" id="postEditor" rows="3" name="content"></textarea>
            </div>
            <button class="btn btn-info btn-block" type="submit">Publier</button>
        </form>';
    
}elseif($template=='editpost'){
        $content = '
        <form class="border border-light p-1 p-lg-5" action="?view=admin&amp;chapitre='.$post->_id.'&amp;db=updatePost" method="post">
            <!-- Titre -->
            <h4 class="h4">Titre</h4>
            <input type="text" id="defaultContactFormName" class="post-edition form-control mb-4" placeholder="Titre" name="title" value="'.$post->_title.'"></input>
            <!-- Contenu -->
            <div class="form-group">
                <h5 class="h5">Contenu</h5>
                <textarea class="form-control rounded-0" id="postEditor" rows="3" name="content" >'.$post->_content.'
                </textarea>
            </div>
            <!-- publier -->
            <button class="btn btn-info btn-block" type="submit">Publier</button>
        </form>'
        ;
}
require('view/templates/backend/dashboard.php');