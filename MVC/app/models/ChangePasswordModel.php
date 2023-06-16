<?php

class ChangePasswordModel extends Model {
    public function updatePassword($userId, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $query = "UPDATE users SET password = '$hashedPassword' WHERE userid = '$userId'";
        mysqli_query($this->connection, $query);
    }
    public function getUserData($id)
    {
        $query = "SELECT * FROM users WHERE userid = '$id'";
        $result = mysqli_query($this->connection, $query);
        return mysqli_fetch_assoc($result);
    }
}
