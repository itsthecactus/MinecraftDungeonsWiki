<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="/img/main_icon.png">
    <link rel="stylesheet" type="text/css" href="../style/style_login.css">
</head>
<body>
<?php
$JSON_PATH = '../data/users.json';
$JSON_DATA = json_decode(file_get_contents($JSON_PATH), true);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = $_POST['username'];
    $pw = $_POST['pw'];
    $valid = false;
    for ($i = 0; $i < sizeof($JSON_DATA); $i++){
        if ($username == $JSON_DATA[$i]['username'] && $pw == $JSON_DATA[$i]['password']) {
            $valid = true;
            $JSON_DATA[$i]['last_log'] = date_create('now');
            break;
        }
    }

    $update = json_encode($JSON_DATA, JSON_PRETTY_PRINT);
    file_put_contents($JSON_PATH, $update);

    if ($valid){
        setcookie('username', $username, time() + (86400 * 30), '/');

        header("Location:main_page.php");
    } else {
        echo "
            <form class='login' action='registration.php'>
                <p class='msg'>You are not registered yet</p>
                <input type='submit' class='login button press' value='REGISTER'><br>
                <a class='login menu press' href='login.php'>BACK TO LOGIN</a>
            </form>
            
        ";
    }
}
?>
</body>
</html>
