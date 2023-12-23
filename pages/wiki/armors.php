<?php
setcookie('file', 'armors', time() + 86400, './');
header('Location:wiki.php');