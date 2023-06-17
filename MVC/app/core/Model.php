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

    public function get_all_item_reviews($item_id)
    {
        $query = "SELECT * FROM reviews WHERE reviewed_item_id = ".$item_id;
        return $this->execute_query($query);
    }

    public function get_class_name_from_id($class_id)
    {
        $query = "SELECT * FROM classes WHERE class_id = ".$class_id;
        return $this->execute_query($query)[0][1];
    }

    public function get_user_name_from_id($user_id)
    {
        $query = "SELECT * FROM users WHERE userid = ".$user_id;
        return $this->execute_query($query)[0][1];
    }
    function isAdmin($userId) {
        $query = "SELECT isadmin FROM users WHERE userid = ?";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $userId);
        $statement->execute();
        $statement->bind_result($isAdmin);
        $statement->fetch();
        $statement->close();
        
        return $isAdmin === 1;
    }
    public function logout() {
        session_start();
        session_destroy();
        header("Location: login");
        exit();
    }
    
}