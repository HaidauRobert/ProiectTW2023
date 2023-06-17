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
        <form class="login-form" method="post" enctype="multipart/form-data">
            <input type="text" placeholder="Nume" name="nume-obiect" class="input" required>
            <?php if (!empty($data['emoji'])) : ?>
                <div style="color: darkred; font-size: 20px; font-weight: bold; text-decoration: underline;";> <?php echo $data['emoji']; ?> </div>
            <?php endif; ?>
            <div class="emojis">
                <p> Cat de mult te enerveaza? </p>
                <label>
                    <input type="radio" name="picture" value="-5">
                    <img src="<?php echo ROOT ?>/poze/Swearing.png" alt="Emoji 1">
                </label>
                <label>
                    <input type="radio" name="picture" value="-4">
                    <img src="<?php echo ROOT ?>/poze/Rage.png" alt="Emoji 2">
                </label>
                <label>
                    <input type="radio" name="picture" value="-3">
                    <img src="<?php echo ROOT ?>/poze/Mad.png" alt="Emoji 3">
                </label>
                <label>
                    <input type="radio" name="picture" value="-2">
                    <img src="<?php echo ROOT ?>/poze/Angry.png" alt="Emoji 4">
                </label>
                <label>
                    <input type="radio" name="picture" value="-1">
                    <img src="<?php echo ROOT ?>/poze/Offput.png" alt="Emoji 5">
                </label>
            </div>
            <p> Povesteste si altora! </p>
            <textarea placeholder="Spune-ti oful" name="descriere-obiect" class="input" required></textarea>

            <?php if (!empty($data['tags'])) : ?>
                <div style="color: darkred; font-size: 20px; font-weight: bold; text-decoration: underline;";> <?php echo $data['tags']; ?> </div>
            <?php endif; ?>

            <p> Ce fel de lucru e? </p>
            <ul>
                <?php
                    $tags_array = $data['all_tags'];
                    foreach($tags_array as $tag) {
                        foreach($tag as $tag_name) {
                        echo '<li><input type="checkbox" name="choice[]" value="' . $tag_name . '">' . $tag_name . '</li>';
                        }
                    }
                ?>
            </ul>

            <?php if (!empty($data['location'])) : ?>
                <div style="color: darkred; font-size: 20px; font-weight: bold; text-decoration: underline;";> <?php echo $data['location']; ?> </div>
            <?php endif; ?>

            <p> Unde se intampla? </p>
            <ul>
                <?php
                    $locations_array = $data['all_locations'];
                    foreach($locations_array as $location) {
                        foreach($location as $location_name) {
                        echo '<li><input type="radio" name="choice2[]" value="' . $location_name . '">' . $location_name . '</li>';
                        }
                    }
                ?>
            </ul>
            <p> O poza? </p>

            <div class="buton-poza">
                <input type="file" id="post-picture" name="post-picture" required>
            </div>
            <input type="submit" value="Posteaza" class="inputSubmit">
        </form>
    </div>
</body>
</html> 


<!-- TODO add multiple tags, location tags and image to new post form -->