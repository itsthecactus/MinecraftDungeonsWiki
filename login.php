<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="/img/main_icon.png">
</head>
<body>
<form action="pages/successful_login.php" method="POST">
    <label>Username:
        <input type="text" name="username" required autofocus>
    </label><br>
    <label>Password:
        <input type="password" name="pw" required>
    </label><br>
    <input type="submit" value="LOGIN">
</form>
<a href="pages/registration.php">Register</a>
</body>
</html>