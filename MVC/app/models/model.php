<?php


class Model
{
    #include dirname(__FILE__). "/../core/Database.php";
    #$connection;

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


    public function get_average_item_score($item_id)#this does not belong in this class, will need to be moved
    {
        $all_rows = $this->get_all_item_reviews($item_id);

        $avg = 0.0;
        $count = 0.0;

        foreach ($all_rows as $row)
        {
            $avg = $avg + $row[4];
            $count = $count + 1;
        }

        return $avg / $count;
    }
}