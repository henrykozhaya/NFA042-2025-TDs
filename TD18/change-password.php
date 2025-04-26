<?php require_once 'security.php'; ?>
<?php
// Liban@2025
if($_SERVER["REQUEST_METHOD"] == "GET"){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="max-width: 330px; margin: 50px auto; padding: 30px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
        <h2 style="text-align: center; color: #333;">Change Password</h2>
        <form action="change-password.php" method="POST">
        <div style="margin-bottom: 15px;">
            <label for="oldPassword" style="display: block; margin-bottom: 5px;">Old Password</label>
            <input type="password" name="oldPassword" id="oldPassword" value="" style="width: 300px; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="newPassword" style="display: block; margin-bottom: 5px;">New Password</label>
            <input type="password" name="newPassword" id="newPassword" value="" style="width: 300px; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="text-align: center;">
            <button type="submit" style="padding: 10px 20px; background-color: #007BFF; border: none; border-radius: 4px; color: #fff; cursor: pointer;">
            Update Password
            </button>
        </div>        
        </form>
    </div>
</body>
<?php
}
else if($_SERVER["REQUEST_METHOD"] == "POST"){
    if
    (
        isset($_POST["oldPassword"])
        && isset($_POST["newPassword"])
        && !empty($_POST["oldPassword"])
        && !empty($_POST["newPassword"])
    )
    {
        if(isValidPassword($_POST["newPassword"])){
            $conn = getPDOConnection();
            $sql = "SELECT `password` FROM users WHERE username = :username";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam("username", $_SESSION["user"]["username"], PDO::PARAM_STR);
            $stmt->execute();
            if($stmt->rowCount() > 0){ // Kind of useless
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if(password_verify($_POST["oldPassword"], $user["password"])){
                    $newPassword = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);
                    $sql = "UPDATE users SET `password` = :newPassword WHERE username = :username";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam("newPassword", $newPassword, PDO::PARAM_STR);
                    $stmt->bindParam("username", $_SESSION["user"]["username"], PDO::PARAM_STR);
                    $stmt->execute();  
                    if($stmt->rowCount() > 0){
                        $_SESSION["success"] = "Password Changed Successfully";
                    }                  
                    else{
                        $_SESSION["error"] = "Couldn't Change your password";
                    }
                }
                else{
                    $_SESSION["error"] = "Your old Password is incorrect";
                }
            }
            else{
                $_SESSION["error"] = "Couldn't Change your password";
            }
        }
        else{
            $_SESSION["error"] = "Password should be min 8 characters with at least 1 capital letter, 1 small cap, 1 digit and 1 special character";
        }
    }
    else{
        $_SESSION["error"] = "Password is not submitted";
    } 
    header("location:profile.php");   
}
?>