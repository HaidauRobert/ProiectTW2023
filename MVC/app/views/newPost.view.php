<!DOCTYPE html>
<html lang="en-us">
<head>
    <title>
        I Dislike It
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo ROOT ?>/css/newpost.css">
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
                <li><a href="myprofile">Profilul meu</a></li>
            </ul>
        </div>
    </nav>
    <div class="new-post">
        <form class="login-form" method="post">
            <input type="text" placeholder="Nume" name="nume-obiect" class="input" required>
            <div class="emojis">
                <p> Cat de mult te enerveaza? </p>
                <label>
                    <input type="radio" name="picture" value="1">
                    <img src="<?php echo ROOT ?>/poze/Swearing.png" alt="Emoji 1">
                </label>
                <label>
                    <input type="radio" name="picture" value="2">
                    <img src="<?php echo ROOT ?>/poze/Rage.png" alt="Emoji 2">
                </label>
                <label>
                    <input type="radio" name="picture" value="3">
                    <img src="<?php echo ROOT ?>/poze/Mad.png" alt="Emoji 3">
                </label>
                <label>
                    <input type="radio" name="picture" value="4">
                    <img src="<?php echo ROOT ?>/poze/Angry.png" alt="Emoji 4">
                </label>
                <label>
                    <input type="radio" name="picture" value="5">
                    <img src="<?php echo ROOT ?>/poze/Offput.png" alt="Emoji 5">
                </label>
            </div>
            <p> Povesteste si altora! </p>
            <textarea placeholder="Spune-ti oful" name="descriere-obiect" class="input" required></textarea>
            <p> Ce fel de lucru e? </p>
            <ul>
                <li><input type="checkbox" id="choice1" name="choice" value="1"><label for="choice1">Facultate</label></li>
                <li><input type="checkbox" id="choice2" name="choice" value="2"><label for="choice2">Oameni</label></li>
                <li><input type="checkbox" id="choice3" name="choice" value="3"><label for="choice3">Vreme</label></li>
            </ul>
            <p> Unde se intampla? </p>
            <ul>
                <li><input type="checkbox" id="choice4" name="choice2" value="1"><label for="choice4">Iasi</label></li>
                <li><input type="checkbox" id="choice5" name="choice2" value="2"><label for="choice5"> Universitatea "Alexandru Ioan Cuza" </label></li>
                <li><input type="checkbox" id="choice6" name="choice2" value="3"><label for="choice6"> Romania </label></li>
            </ul>
            <p> O poza? </p>
            <div class="buton-poza">
                <input type="file" id="post-picture" name="post-picture">
            </div>
            <input type="submit" value="Posteaza" class="inputSubmit">
        </form>
    </div>
</body>
</html> 


<!-- TODO add multiple tags, location tags and image to new post form -->