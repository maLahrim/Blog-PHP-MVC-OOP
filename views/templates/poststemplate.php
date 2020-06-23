<?php
$frontPosts='
<div class="col-lg-4 p-0 px-lg-3 pt-3">
    <h3 class="accent-color">'.$this->_title.'</h3>
    <p>'.$this->_content.'</p>
    <p class="text-right">
        <a class="text-right" href="/?id='.$this->_postId.'&amp;action=Chapitre">lire plus</a>
    </p>
</div>';

$backPosts='

    <div class="d-flex flex-column back-card p-3 mb-3">
        <div class="d-flex justify-content-between ">
        <h6 class="blue-text" >'.$this->_title.'</h6>
        <p class="blue-text">'.$this->_date.'</p>
        </div>
        <div>
        '.$this->_content.'
        </div>
        <div class="d-flex justify-content-between">
            <a href="/?action=admin&chapitre='.$this->_postId.'" class="btn btn-warning p-1 ">Modifier</a>
            <a href="/?action=admin&delete='.$this->_postId.'" type="button" class="btn btn-danger p-1 ">Supprimer</a>
        </div>
    </div>

';
