<?php require_once 'security.php'; ?>
<?php

if(isset($_SESSION["user"])) header("location:profile.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if
    (
        isset($_POST["username"])
        && isset($_POST["password"])
        && !empty($_POST["username"])
        && !empty($_POST["password"])
    )
    {
        extract($_POST);
        $username = htmlspecialchars($username);

        $conn = getPDOConnection();
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam("username", $username, PDO::PARAM_STR);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($password, $user["password"])){
                $_SESSION["error"] = null;
                $_SESSION["user"]["id"] = $user["id"];
                $_SESSION["user"]["username"] = $user["username"];
                $_SESSION["user"]["name"] = $user["name"];
                $_SESSION["user"]["email"] = $user["email"];
                $_SESSION["user"]["phone"] = $user["phone"];

                header("location:profile.php");
                exit();
            }
        }
    }
    $_SESSION["error"] = "Invalid Credentials!";
    header("location:login.php");
}
else if($_SERVER["REQUEST_METHOD"] == "GET"){
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <style>
            div{margin-bottom:20px;}
            input{padding:10px;}
            .error{font-weight: bold;color:darkred;}
        </style>
    </head>
    <body>
        <div style="max-width: 330px; margin: 50px auto; padding: 30px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
            <h3 style="text-align:center;">Login</h3>
            <form action="login.php" method="POST">
            <div style="margin-bottom: 15px;">
                <label for="username" style="display: block; margin-bottom: 5px;">Username</label>
                <input type="text" name="username" id="username" value="johndoe" style="width: 300px; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="password" style="display: block; margin-bottom: 5px;">Password</label>
                <input type="password" name="password" id="password" value="Liban@2025" style="width: 300px; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="text-align: center;">
                <button type="submit" style="padding: 10px 20px; background-color: #007BFF; border: none; border-radius: 4px; color: #fff; cursor: pointer;">
                Login
                </button>
            </div>
            <?php if(isset($_SESSION["error"])): ?>
                <div class="error" style="margin-top: 15px; font-weight: bold; color: darkred; text-align: center;">
                <?= $_SESSION["error"] ?>
                </div>
            <?php endif; ?>
            </form>
        </div>
    </body>
    </html>
<?php
}
?>