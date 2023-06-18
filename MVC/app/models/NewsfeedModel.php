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

        public function get_items_of_class($class_id)
        {
            $query = "SELECT * FROM items";

            $all_items = $this->execute_query($query);

            $class_items = array();

            foreach ($all_items as $item_row)
            {
                for ($j = 2; $j <= 7; $j++ )
                {
                    if ($item_row[$j] == $class_id)
                    {
                        $class_items[count($class_items)] = $item_row;
                        break;
                    }
                }
            }

            return $class_items;
        }

        public function get_class_name_by_id($class_id)
        {
            $class_row = $this->execute_query("SELECT * FROM classes where class_id = ". $class_id);
            return $class_row[0][1];
        }

        public function get_class_id_by_name($class_name)
        {
            echo "class name:".$class_name;
            $class_row = $this->execute_query("SELECT * FROM classes where class_name = '$class_name'");
            print_r($class_row);
            return $class_row[0][0];
        }

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


        public function subscribe_to_class($user_id, $class_id)
        {
            $query = "INSERT into subscriptions (subscriber_user_id, subscribed_class_id) VALUES ('$user_id', '$class_id')";
            $this->execute_query_without_fetch($query);
        }

        public function unsubscribe_to_class($user_id, $class_id)
        {
            $query = 'DELETE FROM subscriptions WHERE subscriber_user_id = '.$user_id.' and subscribed_class_id = '.$class_id;
            #$query = "INSERT into subscriptions (subscriber_user_id, subscribed_class_id) VALUES ('$user_id', '$class_id')";
            #$query = 'UPDATE subscriptions SET user_id = -1 WHERE  (subscriber_user_id = '.$user_id.' and subscribed_class_id = '.$class_id.')';
            $this->execute_query_without_fetch($query);
        }
        
    }