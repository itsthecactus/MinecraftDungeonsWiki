<?php
setcookie('file', 'artifacts.json', time() + 86400, './');
header('Location:wiki.php');