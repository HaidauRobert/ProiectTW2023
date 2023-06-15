<?php
    require_once "model.php";


    class NewsfeedModel extends Model
    {
        public function get_newsfeed_entries()
        {
            return $this->execute_query("select * from `classes`");
        }

        public function get_user_subscriptions($user_id)
        {
            $query = "SELECT * FROM subscriptions WHERE subscriber_user_id = ".$user_id;
            return $this->execute_query($query);
        }

        public function get_class_name_from_id($class_id)
        {
            $query = "SELECT * FROM classes WHERE class_id = ".$class_id;
            return $this->execute_query($query);
        }

        
    }