<!DOCTYPE html>
<head>
    <title>My Profile</title>
    <link rel="stylesheet" href="<?php echo ROOT ?>/css/myprofile.css">
</head>
<body> 
<nav>
        <div class="logo">
            <a href="home">
                <img src="<?php echo ROOT ?>/poze/logo.png" alt="Logo">
            </a>
        </div>
        <div class="nav-buttons">
            <ul>
              <li><a href="home">Home</a></li>
                <li><a href="myprofile">My Profile</a></li>
                <?php if (!empty($data['admin'])): ?>
                <li><a href="admin">Admin Panel</a></li>
                <?php endif; ?>
                <li><a href="newsfeed">Newsfeed</a></li>
                <li><a href="logout">Logout</a></li>
            </ul>
        </div>
  </nav>
    <div class="container">
        <div class="card">
            <div class="text">
                <b><h1 class="panel-text">My Profile</h1></b>
                <br><br>
                <div class="poza">
                    <h2>Your Profile Picture</h2>
                    <br>
                    <?php if (!empty($data['profilePicture'])): ?>
                        <img class="profil" src="<?php echo ROOT ?>/poze/<?php echo $data['profilePicture']; ?>" alt="<?php echo ROOT ?>/poze/profil.jpeg">
                    <?php else: ?>
                        <img class="profil" src="<?php echo ROOT ?>/poze/profil.jpeg" alt="Default Profile Picture">
                    <?php endif; ?>
                    <br>
                    <form method="post" enctype="multipart/form-data">
                        <input type="file" name="image" accept=".jpg, .jpeg, .png" class="input">
                        <br><br>
                        <input class="submitclass" type="submit" name="upload" value="Upload">
                    </form>
                </div>
                <br><br>
                <div class="changepass">
                    To change your password, press <a href="ChangePassword"><b>here</b></a>
                </div>
            </div>
        </div>
    </div>
    <br>
</body>
</html>
