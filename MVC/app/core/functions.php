<?php

function check_login($con)
{
    
    if(isset($_SESSION['userid']))
    {      
        $id = $_SESSION['userid'];
        
        $query = "select * from users where userid= '$id' limit 1";
        $result = mysqli_query($con,$query);
        if ($result && mysqli_num_rows($result)>0)
        {

            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    header("Location: http://localhost/ProiectTW2023/MVC/public/login");
    $app = new App;
    $app->loadController();

    
}

function get_emoji_path_from_score($review_value)
{
    $emoji_path = "";
    if ($review_value == -5)
    {
        $emoji_path = ROOT."/poze/Swearing.png";
    }
    else if ($review_value == -4)
    {
        $emoji_path = ROOT."/poze/Rage.png";
    }
    else if ($review_value == -3)
    {
        $emoji_path = ROOT."/poze/Mad.png";
    }
    else if ($review_value == -2)
    {
        $emoji_path = ROOT."/poze/Angry.png";
    }
    else if ($review_value == -1)
    {
        $emoji_path = ROOT."/poze/Offput.png";
    }

    return $emoji_path;
}
?>