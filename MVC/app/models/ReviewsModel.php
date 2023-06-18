<?php 

class ReviewsModel extends Model
{
    #get all item reviews is defined in base class

    public function get_average_item_score($item_id)
    {
        $all_rows = $this->get_all_item_reviews($item_id);


        if (count($all_rows) == 0)
            return 0;

        $avg = 0.0;
        $count = 0.0;

        foreach ($all_rows as $row)
        {
            $avg = $avg + $row[4];
            $count = $count + 1;
        }

        return $avg / $count;
    }


    public function get_review_is_liked_by_user($review_id, $user_id)
    {
        $query = "SELECT * FROM likes WHERE liked_review_id = ".$review_id." and liker_user_id = ".$user_id;
        $all_rows = $this->execute_query($query);

        if (count($all_rows) > 0)
            return 1;
        else
            return 0;
    }

    public function get_item_from_id($item_id)
    {
        $query = "SELECT * FROM items where item_id = ".$item_id;
        return $this->execute_query($query)[0];
    }

    public function like_review($user_id, $review_id)
    {
        $query = "INSERT into likes (liker_user_id, liked_review_id) values ('$user_id', '$review_id')";
        $this->execute_query_without_fetch($query);
    }

    public function unlike_review($user_id, $review_id)
    {
        $query = 'DELETE FROM likes WHERE liker_user_id = '.$user_id.' and liked_review_id = '.$review_id;
        $this->execute_query_without_fetch($query);
    }

    public function get_all_items()
    {
        $query = 'SELECT * FROM items';
        return $this->execute_query($query);
    }

    public function get_class_id_by_name($class_name)
    {
        echo "class name:".$class_name;
        $class_row = $this->execute_query("SELECT * FROM classes where class_name = '$class_name'");
        print_r($class_row);
        return $class_row[0][0];
    }
}