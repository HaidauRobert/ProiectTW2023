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

    public function execute_query_without_fetch($query_string)
    {
        mysqli_query($this->connection, $query_string);
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

    public function get_review_like_count($review_id)
    {
        $query = "SELECT * FROM likes WHERE liked_review_id = ".$review_id;
        $all_rows = $this->execute_query($query);
        return count($all_rows);
    }

    public function get_most_liked_review_of_item($item_id)
    {
        $all_rows = $this->get_all_item_reviews($item_id);

        if (count($all_rows) == 0)
            return NULL;

        $max_likes = 0; $max_index = 0; $current_index = 0;

        foreach ($all_rows as $row)
        {
            $current_likes = $this->get_review_like_count($row[0]);

            if ($current_likes >= $max_likes)
            {
                $max_likes = $current_likes;
                $max_index = $current_index;

            }
            $current_index = $current_index + 1;
        }

        return $all_rows[$max_index];
    }

    public function get_item_total_reviews($item_id)
    {
        $query = "SELECT * FROM reviews WHERE reviewed_item_id = ".$item_id;
        $all_item_reviews = $this->execute_query($query);
        return count($all_item_reviews);
    }

    public function get_user_is_subscribed_to_class($user_id, $class_id)
    {
        $query = "SELECT * FROM subscriptions where subscriber_user_id = ".$user_id." and subscribed_class_id = ".$class_id;
        $all_results = $this->execute_query($query);
        if (count($all_results) > 0)
            return 1;
        return 0;
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