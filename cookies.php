<?php
setcookie('username', '1234', time() + 10);
setcookie('username', '1234', 1);
echo $_COOKIE['username'];
