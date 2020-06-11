<?php 
        while($article = $posts->fetch())
                {
                $article['content'] = substr($article['content'], 0, 160).'...';
                echo 
                        '<div class="col-lg-4 p-0 px-lg-3 pt-3">
                                <h3 class="accent-color">'.$article['title'].'</h3>
                                <p>'.$article['content'].'</p>
                                <p class="text-right">
                                        <a class="text-right" href="/blog/?id='.$article['id'].'&amp;action=Chapitre">lire plus</a>
                                </p>
                        </div>
                        ';
                } 
        $posts->closeCursor();
?>
