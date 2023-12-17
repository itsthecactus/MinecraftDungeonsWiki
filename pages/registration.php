<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="/img/main_icon.png">
    <link rel="stylesheet" type="text/css" href="../style/style_login.css">
</head>
<body>
<form class="login" action="successful_registration.php" method="POST">
    <div class="parent_container">
    <div class="container">
        <input type="text" class="login input text" name="username" placeholder="username" required autofocus><br>
        <input type="password" class="login input password" name="pw" placeholder="password" required>
    </div>
    <input type="submit" class="login button press" value="REGISTER"><br>
    <a class="login menu press" href="login.php">login</a>
    </div>
</form>
</body>
</html>