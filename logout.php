<?php
session_start();
session_unset();
session_destroy();

header("Location: /web-programming/assignment/login.php");
exit();