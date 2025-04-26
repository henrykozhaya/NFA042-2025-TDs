<?php require_once 'security.php'; ?>

<h2>Welcome <?= $_SESSION["user"]["name"] ?>!</h2>

<div><a href="logout.php">Logout</a>