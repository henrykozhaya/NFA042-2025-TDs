<?php
require_once '../functions.php';
session_start();
$privatePages = [
    "/nfa042-2025-tds/td18/profile.php",
    "/nfa042-2025-tds/td18/change-password.php",
];

if( 
    in_array(
        strtolower($_SERVER["PHP_SELF"]), 
        $privatePages
    ) 
    && !isset($_SESSION["user"]) 
)
{
    header("location:login.php");
    exit();
}