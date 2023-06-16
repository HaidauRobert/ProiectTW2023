<!DOCTYPE html>
<head>
<title>I DisLike It</title>
<link rel="stylesheet" href="<?php echo ROOT ?>/css/stylelogin.css">
</head>
<body> 
    <nav>
        <div class="logo">
            <a href="home">
                <img src="<?php echo ROOT ?>/poze/logo.png" alt="Logo">
            </a>
        </div>
    </nav>
    <div class="login">
        <div class="form">
            <form class="login-form" method="post">
                <div style="color:white; margin-bottom:2%">
                <?php if (!empty($data['message'])) : ?>
                    <div><?php echo $data['message']; ?></div>
                <?php endif; ?>
                </div>
                <input type="text" placeholder="Nume utilizator" name="nume1" class="input" required>
                <input type="password" placeholder="Parola" name="parola1" class="input" required>
                <input type="submit" value="Login" class="inputSubmit">
                <p class="message">Don't have an account? <a href="signup">Sign up</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>