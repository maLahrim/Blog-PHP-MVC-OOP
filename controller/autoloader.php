<?php
    // Auto Load class
    function classloader($class)
    {
        $files = array('controller/' . $class . '.php', 'model/' . $class . '.php');

        foreach ($files as $file)
        {
            if (file_exists($file))
            {
                require_once $file;
            }
        }
    }
    spl_autoload_register('classloader');
    require_once('includes/functions.php'); // menu + page title + filter functions
    require_once('view/templates/common/commentstemplate.php'); //Back end + front end comments template functions
    require_once('view/templates/common/poststemplate.php'); //Back end + front end posts template function
    require_once('controller/frontend.php'); 
    require_once('controller/backend.php');