<?php 

class MyProfileModel extends Model {
    public function updateProfilePicture($userId, $image)
    {
        $sql = "UPDATE Users SET image = '$image' WHERE userid = '$userId'";
        if ($this->connection->query($sql) === true) {
            return true;
        } else {
            echo "Error updating profile picture: " . $this->connection->error;
            return false;
        }
    }
    

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
}
