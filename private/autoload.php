<?php

/**
 * Functions for various module in the sms
 * 
 * PHP version 5
 * 
 * @category  Functions
 * @package   Functions
 * @author    Theophilus Menor <ajirimenor@gmail.com>
 * @copyright 2022 Menor SMS
 * @license   https://www.baseoncode.com Menor MMC License
 * @link      https://www.baseoncode.com
 */
    session_start();
    ob_start(); //Output buffering is turned on
    
    //Error reporting state
    // error_reporting(E_ALL | E_STRICT);
    // ini_set('display_errors', 0);

    require_once __DIR__ . '\dbcon.php';
    // require_once __DIR__ . '\query-functions.php';
    // require_once __DIR__ . '\functions.php';


    //Call the database connection function
    $conn = db_connect();

   
?>