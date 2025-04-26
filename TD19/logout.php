<?php
session_start();
session_destroy();
setcookie("rememberme_token", "", time() - 3600, "/");
header("location:login.php");