<?php


class Model
{
    #include dirname(__FILE__). "/../core/Database.php";
    public $connection;

    public function __construct()
    {
        $db_server_name = "localhost";
        $db_username = "root";
        $db_password = "";
        $db_name = "web2023";

        $this->connection = mysqli_connect($db_server_name, $db_username, $db_password, $db_name);
    }
    

    public function execute_query($query_string)
    {
        $query_result = mysqli_query($this->connection, $query_string);
        $all_rows = mysqli_fetch_all($query_result);
        return $all_rows;
    }
    
    public function getData() {
        // Perform database query or any other logic to retrieve data
        // For example, retrieving a list of users from the database

        $query = "SELECT * FROM users";
        $result = mysqli_query($this->connection, $query);

        if ($result) {
            // Fetch the data from the result set
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // Return the retrieved data
            return $data;
        }

        return null; // Return null or handle the error case as needed
    }
}