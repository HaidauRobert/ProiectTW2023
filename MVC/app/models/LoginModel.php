<?php

class LoginModel extends Model {
    public function authenticateUser($username, $password) {
        $query = "SELECT * FROM users WHERE name='$username' LIMIT 1";
        $result = mysqli_query($this->connection, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if (password_verify($password, $user_data['password'])) {
                return $user_data;
            }
        }
        
        return null; 
    }
}
