<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="/img/main_icon.png">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
<form class="login" action="successful_registration.php" method="POST">
    <label class="login label">Username:
        <input type="text" class="login input text" name="username" required autofocus>
    </label><br>
    <label class="login label">Password:
        <input type="password" class="login input password" name="pw" required>
    </label><br>
    <input type="submit" class="login button" value="REGISTER"><br>
    <a class="login ref" href="login.php">Back to login</a>
</form>
</body>
</html>