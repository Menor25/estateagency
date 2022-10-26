<?php
require_once "db-credentials.php";

class Database {

    public $connection;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->open_db_connection();
    }

     /**
     * Connection to database.
     */
    public function open_db_connection()
    {
        $this->connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

        if ($this->connection->connect_errno) {

            die("Database connection failed" . $this->connection->connect_error);
        }
    }

     /**
     * Function that confirm database query.
     */
    private function confirm_query($result) 
    {
        if (!$result) {
            die("Query faild" . $this->connection->error);
        }
    }

     /**
     * Function that query the database.
     */
    public function query($sql) 
    {
        $result = $this->connection->query($sql);
        $this->confirm_query($result);
        return $result;
    }

    /**
     * Function that escapes all strings.
     */
    public function escape_string($string) 
    {
        $escaped_string = mysqli_real_escape_string($this->connection, $string);
        return $escaped_string;
    }

    /**
     * Function that get the last insert id into the database.
     */
    public function the_insert_id() 
    {
        // $insert_id = $this->connection->insert_id();
        return mysqli_insert_id($this->connection);
    }
} // EOF class database

$database = new Database();


?>