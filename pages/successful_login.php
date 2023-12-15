<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="/img/main_icon.png">
</head>
<body>
<?php
$JSON_PATH = '../data/users.json';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $pw = $_POST['pw'];
    $user = array(
        'username' => $username,
        'password' => $pw
    );
    $JSON_DATA = json_decode(file_get_contents($JSON_PATH), true);

    $valid = false;
    foreach ($JSON_DATA as $array){
        if ($user == $array)
            $valid = true;
    }

    if ($valid){
        header("Location:main_page.php");
    } else {
        echo "<h1>You are not registered yet</h1>
            <form action='registration.php'>
            <input type='submit' value='REGISTER'>
            </form><br>
            <a href='../login.php'>Back to login</a>
            ";
    }
}
?>
</body>
</html>
