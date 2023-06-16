<?php
class SignupModel extends Model
{
    public function validateSignup($user_name, $email)
    {
        $name_error = "";

        $sql_u = "SELECT * FROM Users WHERE name='$user_name'";
        $sql_e = "SELECT * FROM Users WHERE email='$email'";
        $res_u = mysqli_query($this->connection, $sql_u);
        $res_e = mysqli_query($this->connection, $sql_e);

        if (mysqli_num_rows($res_u) > 0) {
            $name_error = "Username-ul este deja folosit";
        } else if (mysqli_num_rows($res_e) > 0) {
            $name_error = "Email-ul este deja folosit";
        }

        return $name_error;
    }

    public function saveUser($user_name, $password, $email)
    {
        $query = "INSERT INTO Users (name, password, email) VALUES ('$user_name', '$password', '$email')";
        mysqli_query($this->connection, $query);
    }
}