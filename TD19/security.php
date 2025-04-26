<?php
session_start();
require_once '../functions.php';

// Remember Me Functionality - Auto-Login
if(!isset($_SESSION["user"]) && isset($_COOKIE["rememberme_token"])){
    $token = $_COOKIE["rememberme_token"];
    $conn = getPDOConnection();
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE token = :token");
    $stmt->bindParam("token", $token, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION["error"] = null;
        $_SESSION["user"]["id"] = $user["id"];
        $_SESSION["user"]["username"] = $user["username"];
        $_SESSION["user"]["name"] = $user["name"];
        $_SESSION["user"]["email"] = $user["email"];
        $_SESSION["user"]["phone"] = $user["phone"];        
    }
}
// End OF Remember Me Functionality

$privatePages = [
    "/nfa042-2025-tds/td19/index.php",
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