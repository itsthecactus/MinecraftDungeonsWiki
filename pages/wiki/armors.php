<?php
setcookie('file', 'armors.json', time() + 86400, './');
header('Location:wiki.php');