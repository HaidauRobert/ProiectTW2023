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

    public function getItemId($name) {
        $query = "SELECT item_id FROM items WHERE item_name='$name'";
        $result = mysqli_query($this->connection, $query);
        $item_id_array = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $item_ids = array_column($item_id_array, 'item_id');
        return $item_ids;
    }

    public function getItemIdLoc($name, $location) {
        $location_id = $location["location_id"];

        $query = "SELECT item_id FROM items WHERE item_name='$name' AND location_class_id='$location_id'";
        $result = mysqli_query($this->connection, $query);
        $item_id_array = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $item_ids = array_column($item_id_array, 'item_id');
        return $item_ids;
    }

    public function getLocationByID($ID) {
        $query = "SELECT location_class_id FROM items WHERE item_id='$ID' LIMIT 1";
        $result = mysqli_query($this->connection, $query);
        $item_location = mysqli_fetch_assoc($result);
        return $item_location;
    }

    public function getLocationClassID($location) {
        $query = "SELECT location_id FROM classes c JOIN locations l ON c.class_id = l.class_id WHERE c.class_name ='$location'";
        $result = mysqli_query($this->connection, $query);
        $location_id = mysqli_fetch_assoc($result);
        return $location_id;
    }
    
    public function getClassId($class) {
        $query = "SELECT class_id FROM classes WHERE class_name='$class' LIMIT 1";
        $result = mysqli_query($this->connection, $query);
        $class_id = mysqli_fetch_assoc($result);
        return $class_id;
    }

    public function getTagsItem($ID) {
        $query = "SELECT class_id_1, class_id_2, class_id_3, class_id_4, class_id_5 FROM reviews WHERE reviewed_item_id='$ID'";
        $result = mysqli_query($this->connection, $query);
        $rows = mysqli_fetch_all($result);
        return $rows;
    }

    public function postReview($curr_date, $user_id, $item_id, $score, $descr, $tags, $photo) {
        $class_1 = $tags["0"] ?? "-1";
        $class_2 = $tags["1"] ?? "-1";
        $class_3 = $tags["2"] ?? "-1";
        $class_4 = $tags["3"] ?? "-1";
        $class_5 = $tags["4"] ?? "-1";

        $query = "INSERT INTO reviews (review_date, reviewer_user_id, reviewed_item_id, review_score, review_description, class_id_1, class_id_2, class_id_3, class_id_4, class_id_5, review_photo) 
            VALUES ('$curr_date', '$user_id', '$item_id', '$score', '$descr', '$class_1', '$class_2', '$class_3', '$class_4', '$class_5', '$photo')";
        mysqli_query($this->connection, $query);
    }

    public function postItem($name, $tags, $location) {
        $topClass_1 = $tags["0"] ?? "-1";
        $topClass_2 = $tags["1"] ?? "-1";
        $topClass_3 = $tags["2"] ?? "-1";
        $topClass_4 = $tags["3"] ?? "-1";
        $topClass_5 = $tags["4"] ?? "-1";
        $location_id = $location["location_id"] ?? -1;

        $query = "INSERT INTO items (item_name, top_1_class_id, top_2_class_id, top_3_class_id, top_4_class_id, top_5_class_id, location_class_id) 
            VALUES ('$name', '$topClass_1', '$topClass_2', '$topClass_3', '$topClass_4', '$topClass_5', '$location_id')";
        mysqli_query($this->connection, $query);
    }

    public function updateItem($id, $tags) {
        $topClass_1 = $tags["0"] ?? "-1";
        $topClass_2 = $tags["1"] ?? "-1";
        $topClass_3 = $tags["2"] ?? "-1";
        $topClass_4 = $tags["3"] ?? "-1";
        $topClass_5 = $tags["4"] ?? "-1";

        $query = "UPDATE items
        SET top_1_class_id = $topClass_1,
            top_2_class_id = $topClass_2,
            top_3_class_id = $topClass_3,
            top_4_class_id = $topClass_4,
            top_5_class_id = $topClass_5
        WHERE item_id = $id";
        mysqli_query($this->connection, $query);
    }
}