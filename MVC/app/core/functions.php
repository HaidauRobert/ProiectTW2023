<!-- <?php

function check_login($con)
{
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $query = "select * from users where userid= '$id' limit 1";
        $result = mysqli_query($con,$query);
        if ($result && mysqli_num_rows($result)>0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    $user_data = 'Failed';
    return $user_data;
}
?> -->