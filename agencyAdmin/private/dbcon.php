<?php
/**
 * Connection to database
 * 
 * PHP version 5
 * 
 * @category  Database
 * @package   Database
 * @author    Theophilus Menor <ajirimenor@gmail.com>
 * @copyright 2022 Menor SMS
 * @license   https://www.baseoncode.com Menor SMS License
 * @link      https://www.baseoncode.com
 */
require_once 'db-credentials.php';

//Initiate connection if it doesnt exist
if (!function_exists('Db_connect')) {

    /**
     * Database connection
     * 
     * Connect to the databse using parameters
     * 
     * @access public
     * 
     * @author Thephilus Menor
     * 
     * @param sever, db user, db pass, db name 
     * 
     * @return string
     */
    function Db_connect() 
    {
        $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        Confirm_Db_connect();
        return $connection;
    }
}
    
//Check for disconnection function
if (!function_exists('Db_disconnect')) {

    /**
     * Database disconnection
     * 
     * Check if disconnect function exist
     * 
     * @access public
     * 
     * @author Thephilus Menor
     * 
     * @param $connection
     * 
     * @return string
     */
    function Db_disconnect($connection)
    {
        if (isset($connection)) {
            mysqli_close($connection);
        }
    }
}

//Confirm if the database connect successfully
if (!function_exists('Confirm_Db_connect')) {

    /**
     * Database connection success
     * 
     * Check if connection was successful
     * 
     * @access public
     * 
     * @author Thephilus Menor
     * 
     * @param no param
     * 
     * @return string
    */
    function Confirm_Db_connect()
    {
        if (mysqli_connect_error()) {
            $msg = "Database connection faild: ";
            $msg .= mysqli_connect_error();
            $msg .= " (" . mysqli_connect_errno . ")";
            exit($msg);
        }
    }
}


    // function db_connect()
    // {
    //     $connection = new mysqli('localhost', 'root', 'system25$', 'smsdb');
    //     if($connection->connect_error){
    //         exit('Error connecting to database');
    //     }
    // }

?>