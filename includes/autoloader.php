<?php
define('DS', DIRECTORY_SEPARATOR);
    
function myAutoLoader($class)
{
    $parts = preg_split('#\\\#', $class);
    $file =strtolower($parts[0]).DS.$parts[1]. '.php';
    if (file_exists($file)) {
        require_once($file);
    } else {
        return false;
    }
}
require_once('includes/functions.php'); // menu + page title + filter functions
require_once('view/templates/common/commentstemplate.php'); //Back end + front end comments template functions
require_once('view/templates/common/poststemplate.php'); //Back end + front end posts template function
require_once('controller/frontend.php');
require_once('controller/backend.php');
