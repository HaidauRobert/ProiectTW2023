<!DOCTYPE html>
<html>
  <head>
    <title>User Homepage</title>
    <style>
      /* center everything on the screen */
      body {
        background: linear-gradient(to top, rgba(248, 248, 248, 0)25%, rgba(248, 248, 248, 0)25%),rgb(100, 10, 10);
        /*display: flex;*/
        /*justify-content: center;*/
        /*align-items: center;*/
        /*height: 100vh;*/
        margin: 0;
      }
      

      /* container for the user profile */
      .user-profile {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 400px;
        height: 500px;
        background-color: rgba(0, 0, 0, 0.6);
        border-radius: 20px;
        border: 1px solid black;
        padding: 20px;
      }
      
      nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: rgb(56, 0, 0);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  
  .nav-buttons {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  
  .nav-buttons ul {
  display: flex;
  align-items: center;
  list-style-type: none;
  
}

.nav-buttons ul li {
  margin: 0 15px;
  display: inline;
}

  
  .nav-buttons a {
    color: red;
    text-decoration: none;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-size: 17;
  }

  .logo img {
    height: 50px;
  }

      /* profile picture and change button container */
      .profile-pic-container {
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      /* profile picture */
      .profile-pic {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
      }


      /* user info */
      .user-info {
        text-align: center;
        margin-top: 20px;
        color:white;
      }

      /* username */
      .username {
        font-size: 250%;
        font-weight: bold;
      }

      /* reputation and reviews */
      .reputation,
      .reviews {
        font-size: 200%;
        margin-top: 10px;
      }

      /* buttons */
      .buttons {
        display: flex;
        justify-content: space-around;
        width: 100%;
        margin-top: 20px;
      }

      /* individual button */
      .newsfeed-page-button {
	        /*margin-left: 10px;*/
	        padding: 5px 5px;
	        border: none;
	        border-radius: 5px;
	        background-color: rgb(75, 27, 27);
	        color: #fff;
	        font-size: 35px;
	        cursor: pointer;
        }

.newsfeed-page-button:hover {
	background-color: rgb(141, 61, 61);
}

      .red-bar {
        background-color: rgb(128, 15, 0);
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 50px;
        padding: 0 20px;
      }

      .container {
        display:flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
      }

    </style>
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
            </ul>
        </div>
  </nav>
    </p>
  <div class="container">
    <div class="user-profile">
      <div class="profile-pic-container">
        <?php if (!empty($data['profilePicture'])): ?>
                        <img class="profile-pic" src="<?php echo ROOT ?>/poze/<?php echo $data['profilePicture']; ?>" alt="<?php echo ROOT ?>/poze/profil.jpeg">
                    <?php else: ?>
                        <img class="profile-pic" src="<?php echo ROOT ?>/poze/profil.jpeg" alt="Default Profile Picture">
                    <?php endif; ?>
      </div>
      <div class="user-info">
        <div class="username">  <?php if (!empty($data['name'])): ?>
                                <?php echo $data['name']; ?>
                                <?php endif; ?></div>
        <div class="reviews">Reviews: 50</div>
      </div>
      <div class="buttons">
      <a href="newpost"><button class="newsfeed-page-button">I hate it!</button></a>
      </div>
    </div>
  </div>
  </body>
</html>
