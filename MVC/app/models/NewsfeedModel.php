<?php
    #require_once "model.php";


    class NewsfeedModel extends Model
    {

        public function get_user_subscriptions($user_id)
        {
            $query = "SELECT * FROM subscriptions WHERE subscriber_user_id = ".$user_id;
            return $this->execute_query($query);
        }

        public function get_item_from_review_row($review_row)
        {
            $item_row = $this->execute_query("SELECT * FROM items WHERE item_id = ".$review_row[3]);
            return $item_row[0];//returns the first row of the query (there should only be one)
        }

        public function review_fits_subscriptions($review_row, $all_user_subscriptions)
        {
            $reviewed_item_id = $this->get_item_from_review_row($review_row);

            foreach ($all_user_subscriptions as $subscription_row)
            {
                for ($i = 2; $i <= 7; $i++)//check if any of the tags associated with the reviewd item are tags that the user has subscribed to
                {
                    if ($subscription_row[1] == $reviewed_item_id[$i])
                        return 1;
                }
            }

            return 0;
        }

        public function get_newsfeed_entries($user_id)
        {
            $query = "SELECT * FROM reviews";
            $all_reviews = $this->execute_query($query);
            $all_user_subscriptions = $this->get_user_subscriptions($user_id);

            foreach ($all_reviews as $key => $review_row)
            {
                if ($this->review_fits_subscriptions($review_row, $all_user_subscriptions) == 0)
                {
                    unset($all_reviews[$key]);
                }
            }

            return $all_reviews;
        }

        public function get_class_name_by_id($class_id)
        {
            $class_row = $this->execute_query("SELECT * FROM classes where class_id = ". $class_id);
            return $class_row[0][1];
        }
        
    }