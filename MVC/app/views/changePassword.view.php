<?php
$con = get_connection();
$user_data = check_login($con);
?>

<!DOCTYPE html>
<head>
<title>Change Password</title>
<link rel="stylesheet" href="<?php echo ROOT ?>/css/stylelogin.css">
</head>
<body> 
    <nav>
        <div class="logo">
            <a href="Home.php">
                <img src="<?php echo ROOT ?>/poze/logo.png" alt="Logo">
            </a>
        </div>
        <div class="nav-buttons">
            <ul>
                <li><a href="MyProfile.php">Profilul meu</a></li>
            </ul>
        </div>
    </nav>
<div class="login">
    <div class="form">
    <form action="" method="post">
                <input type="password" name="parolaveche" placeholder="Parola veche" class="input" required>
<br>
                <input type="password" name="parolanoua" placeholder="Parola noua" class="input" required>
<br>
                <input type="password" name="confirmaparola" placeholder="Confirma parola noua" class="input" required>
                <input type="submit" value="Schimba parola" class="inputSubmit">
            </form>
        </form>
    </div>
</div>

</body>
</html>