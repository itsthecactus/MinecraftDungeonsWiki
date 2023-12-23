<?php
setcookie('file', 'weapons', time() + 86400, './');
header('Location:wiki.php');