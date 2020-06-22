<?php
$frontComments = 
    '<div class="border border-light p-3 p-lg-5 mt-3 comment-section">
        <h5 class="accent-color">'.htmlspecialchars($comment['pseudo']).'</h5>
        <p class="comment_date">'.$comment['created_at'].'</p>
        <p class="comment_content m-0">'.htmlspecialchars($comment['content']).'</p>
    </div>';
$backComments = '                  
    <tr>
        <th scope="row">Chapitre '.$this->_postId.' </th>
        <td>'.$comment['pseudo'].'</td>
        <td>'.$comment['content'].'</td>
        <td>'.$comment['created_at'].'</td>
    </tr>';