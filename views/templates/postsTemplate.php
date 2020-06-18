<?php 
        while($articles = $posts->fetch())
                {
                //il faut filtrer les output
                showArticles($articles); //___includes/fonctions.php
                } 
        $posts->closeCursor();
