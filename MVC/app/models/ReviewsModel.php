<?php 

class ReviewsModel extends Model
{
    #get all item reviews is defined in base class

    public function get_average_item_score($item_id)
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


    public function get_review_is_liked_by_user($review_id, $user_id)
    {
        $query = "SELECT * FROM likes WHERE liked_review_id = ".$review_id." and liker_user_id = ".$user_id;
        $all_rows = $this->execute_query($query);

        if (count($all_rows) > 0)
            return 1;
        else
            return 0;
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

    public function get_item_from_id($item_id)
    {
        $query = "SELECT * FROM items where item_id = ".$item_id;
        return $this->execute_query($query)[0];
    }
}