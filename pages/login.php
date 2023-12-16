<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="/img/main_icon.png">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
<form class="login" action="successful_login.php" method="POST">
    <div class="parent_container">
    <div class="container">
            <input type="text" class="login input text" name="username" placeholder="username" required autofocus><br>
            <input type="password" class="login input password" name="pw" placeholder="password" required>
    </div>
    <input type="submit" class="login button" value="LOGIN"><br>
    <a class="login ref" href="registration.php">Register</a>
    </div>
</form>
</body>
</html>