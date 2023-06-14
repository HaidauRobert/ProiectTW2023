<?php
$con = get_connection();
$user_data = check_login($con);
?>

<!DOCTYPE html>
<head>
<title>I DisLike It</title>
<link rel="stylesheet" href="<?php echo ROOT ?>/css/stylelogin.css">
</head>
<body> 
    <nav>
        <div class="logo">
                <img src="<?php echo ROOT ?>/poze/logo.png" alt="Logo">
        </div>
    </nav>
    <div class="login">
        <div class="form">
            <form class="login-form" method="post">
                <div style="color:white; margin-bottom:2%">
                <?php
                if ($_SERVER['REQUEST_METHOD']=="POST")
                {
                    //ceva a fost pus
                    $user_name = $_POST['nume1'];
                    $password = $_POST['parola1'];
                    if (!empty($user_name)&&!empty($password))
                    {
                        //citeste din baza de date
                        $query="select * from Users where name='$user_name' limit 1";
                        $result = mysqli_query($con, $query);
                        if ($result)
                        {
                            if ($result && mysqli_num_rows($result)>0)
                            {
                                $user_data = mysqli_fetch_assoc($result);
                                if (password_verify($password,$user_data['password']))
                                {
                                    $_SESSION['user_id'] = $user_data['user_id'];
                                    header("Location: home.php");
                                    die;
                                }
                            }
                        }
                        echo "Numele de utilizator si parola introdusa nu se potrivesc!";
                      
                    }
                    else
                    {
                        echo "Numele de utilizator si parola introdusa nu se potrivesc!";
                    }
                }
                ?>
                </div>
                <input type="text" placeholder="Nume utilizator" name="nume1" class="input" required>
                <input type="password" placeholder="Parola" name="parola1" class="input" required>
                <input type="submit" value="Login" class="inputSubmit">
                <p class="message">Don't have an account? <a href="Signup.php">Sign up</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>