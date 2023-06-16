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
      }

      /* username */
      .username {
        font-size: 24px;
        font-weight: bold;
      }

      /* reputation and reviews */
      .reputation,
      .reviews {
        font-size: 18px;
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
	        font-size: 16px;
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
  <div class="red-bar">
    <h1><button class="logo-button"></button><b>Thanks, I hate it!</b></h1>
    <p>logged in as: 
    <?php if (!empty($data['name'])): ?>
      <?php echo $data['name']; ?>
      <?php endif; ?>
    </p>
  </div>
  <div class="container">
    <div class="user-profile">
      <div class="profile-pic-container">
        <?php if (!empty($data['profilePicture'])): ?>
                        <img class="profile-pic" src="<?php echo ROOT ?>/poze/<?php echo $data['profilePicture']; ?>" alt="Profile Picture">
                    <?php else: ?>
                        <img class="profile-pic" src="<?php echo ROOT ?>/poze/profil.jpeg" alt="Default Profile Picture">
                    <?php endif; ?>
      </div>
      <div class="user-info">
        <div class="username">John Doe</div>
        <div class="reputation"><b>Reputation:</b> 100</div>
        <div class="reviews">Reviews: 50</div>
      </div>
      <div class="buttons">
        <button class="newsfeed-page-button">I hate it!</button>
        <button class="newsfeed-page-button"><a href="Newsfeed">Newsfeed</button>
        <button class="newsfeed-page-button">My Reviews</button>
      </div>
    </div>
  </div>
  </body>
</html>
