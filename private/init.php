<?php

    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
    defined('SITE_ROOT') ? null : define('SITE_ROOT', 'C:' . DS . 'xampp' . DS . 'htdocs' 
        . DS . 'estateagency');
    defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', 'C:' . DS . 'xampp' . DS . 
        'htdocs' . DS . 'estateagency' . DS . 'agencyAdmin' . DS . 'includes');


    require_once "db-credentials.php";
    require_once "dbcons.php";
    require_once "function.php";
    require_once "functions.php";
    require_once "property.php";
    require_once "property-images.php";
    require_once "setting.php";
    require_once "agent.php";
    // require_once "amenities.php";
    require_once "db_object.php";

?>