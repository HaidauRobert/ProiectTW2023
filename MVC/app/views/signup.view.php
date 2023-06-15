<?php
$con = get_connection();
?>

<?php
if ($_SERVER['REQUEST_METHOD']=="POST")
{
    //ceva a fost pus
    $user_name = $_POST['nume1'];
    $email = $_POST['email1'];
    $password = password_hash($_POST['parola1'],PASSWORD_DEFAULT);
    $sql_u = "SELECT * FROM Users WHERE name='$user_name'";
  	$sql_e = "SELECT * FROM Users WHERE email='$email'";
  	$res_u = mysqli_query($con, $sql_u);
  	$res_e = mysqli_query($con, $sql_e);
      if (mysqli_num_rows($res_u) > 0) {
  	  $name_error = "Username-ul este deja folosit"; 	
  	}else 
      if(mysqli_num_rows($res_e) > 0){
  	  $name_error = "Email-ul este deja folosit"; 	
  	}else
    {if (!empty($user_name)&&!empty($email)&&!empty($password))
    {
        //salveaza in baza de date
        $query="insert into Users (name,password,email) values ('$user_name','$password','$email')";

      mysqli_query($con, $query);
       header("Location: home.php");
     die;
    }
    else
    {
        $name_error="Introduceti date valide pentru inregistrare!";
    }}
}
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
            <?php if (isset($name_error)): ?>
                 <span><?php echo $name_error; ?></span>
                <?php endif ?>
            </div>
                <br>
                <input type="text" placeholder="Nume utilizator" name="nume1" class="input" required>
                <input type="email" placeholder="Email" name="email1" class="input" required>
                <input type="password" placeholder="Parola" name="parola1" class="input" required>
                <input type="submit" value="Sign Up" class="inputSubmit">
                <p class="message">Already have an account? <a href="Login.php">Login</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>