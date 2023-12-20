<?php
setcookie('file', 'weapons.json', time() + 86400, './');
header('Location:wiki.php');