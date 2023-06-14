<?php
$con = get_connection();
$user_data = check_login($con);
?>

<!DOCTYPE html>
<head>
<title>My Profile</title>
<link rel="stylesheet" href="<?php echo ROOT ?>/css/myprofile.css">
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
<div class="container">
    <div class="card">
        <div class="text">
            <b><h1 class="panel-text">My Profile</h1></b>
            <br><br>
            <div class ="poza">
                <h2>
                Your Profile Picture
            </h2>
            <br>
            <img class="profil" src="<?php echo ROOT ?>/poze/profil.jpeg"> <br>
          <input type="file" name="image" accept = ".jpg, .jpeg, .png" class="input">
          <br><br><input class="submit" type="submit" name="upload">
            </form>
            </div>  
            <br><br>
               <div class="changepass">
                To change your password press <a href="ChangePassword.html"><b>here</b></a>
            </div>
        </div>
	</div>
</div>
    <br>
</body>
</html>