<?php

class NewPostModel extends Model {

    public function getClasses() {
        $query = "SELECT class_name FROM classes WHERE is_aproved='1' ";
        $result = mysqli_query($this->connection, $query);
        $rows = mysqli_fetch_all($result);

        return $rows;
    }

    public function getLocations() {
        $query = "SELECT c.class_name FROM classes c JOIN locations l ON c.class_id = l.class_id;";
        $result = mysqli_query($this->connection, $query);
        $rows = mysqli_fetch_all($result);

        return $rows;
    }

    public function getItem($name) {
        $query = "SELECT item_id FROM items WHERE item_name='$name' LIMIT 1";
        $result = mysqli_query($this->connection, $query);
        $item_id = mysqli_fetch_assoc($result);
        return $item_id;
    }

    public function getClassId($class) {
        $query = "SELECT class_id FROM classes WHERE class_name='$class' LIMIT 1";
        $result = mysqli_query($this->connection, $query);
        $class_id = mysqli_fetch_assoc($result);
        return $class_id;
    }

    public function postReview($curr_date, $user_id, $item_id, $score, $descr, $tags, $photo) {
        $class_1 = $tags["0"] ?? "no_tag";
        $class_2 = $tags["1"] ?? "no_tag";
        $class_3 = $tags["2"] ?? "no_tag";
        $class_4 = $tags["3"] ?? "no_tag";
        $class_5 = $tags["4"] ?? "no_tag";

        $query = "INSERT INTO reviews (review_date, reviewer_user_id, reviewed_item_id, review_score, review_description, class_id_1, class_id_2, class_id_3, class_id_4, class_id_5, review_photo) 
            VALUES ('$curr_date', '$user_id', '$item_id', '$score', '$descr', '$class_1', '$class_2', '$class_3', '$class_4', '$class_5', '$photo')";
        mysqli_query($this->connection, $query);
    }
}