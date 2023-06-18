<?php 

class HomeModel extends Model {
    public function getProfilePicture($userId)
    {
        $sql = "SELECT image FROM Users WHERE userid = $userId";
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['image'];
        } else {
            return false;
        }
    }
    public function getUserName($userId)
    {
        $sql = "SELECT name FROM Users WHERE userid = $userId";
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['name'];
        } else {
            return false;
        }
    }
    public function getReviewCount($userId)
    {
        $sql = "SELECT COUNT(*) AS review_count FROM reviews WHERE reviewer_user_id = $userId";
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['review_count'];
        } else {
            return 0;
        }
    }

}
