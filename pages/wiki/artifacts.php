<?php
setcookie('file', 'artifacts', time() + 86400, './');
header('Location:wiki.php');