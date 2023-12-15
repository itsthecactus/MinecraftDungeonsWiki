<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>Registration</title>
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

    $duplicate = false;
    foreach ($JSON_DATA as $array){
        if ($username == $array['username'])
            $duplicate = true;
    }

    if (!$duplicate){
        $JSON_DATA[] = $user;
        $new_content = json_encode($JSON_DATA, JSON_PRETTY_PRINT);
        $handler = fopen($JSON_PATH, 'w');
        fwrite($handler, $new_content);
        fclose($handler);

        header("Location:main_page.php");
    } else {
        echo "<h1>Invalid username</h1>
                <a href='registration.php'>Register</a>";
    }
}
?>
</body>
</html>