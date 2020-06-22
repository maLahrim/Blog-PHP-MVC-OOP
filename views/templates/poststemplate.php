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
<table class="table table-hover">
    <!-- Table head -->
    <thead class="blue-grey lighten-4">
        <tr>
            <th class="align-middle w-25 ">Titre</th>
            <th class="align-middle w-50 ">Publié le '.$this->_date.'</th>
            <th class="d-flex justify-content-between">
            <a href="/?action=admin&chapitre='.$this->_postId.'" class="btn btn-warning p-1 ">Modifier</a>
            <a href="/?action=admin&delete='.$this->_postId.'" type="button" class="btn btn-danger p-1 ">Supprimer</a>
            </th>
        </tr>
    </thead>
    <!-- Table head -->
    <!-- Table body -->
    <tbody>
        <tr onclick="document.location = \'?action=admin&chapitre='.$this->_postId.'\';">
            <th>'.$this->_title.'</th>
            <td colspan="3">'.$this->_content.'</td>
        </tr>
    </tbody>
    <!-- Table body -->
</table>';
