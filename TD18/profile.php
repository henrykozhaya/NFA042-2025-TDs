<?php require_once 'security.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="max-width: 600px; margin: 50px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9; font-family: Arial, sans-serif; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center; color: #333;">Profile</h2>
        <p style="font-size: 16px; color: #555;"><strong>Status:</strong> This page is secure!</p>
        <p style="font-size: 16px; color: #555;"><strong>Name:</strong> <?= $_SESSION["user"]["name"] ?></p>
        <p style="font-size: 16px; color: #555;"><strong>Username:</strong> <?= $_SESSION["user"]["username"] ?></p>
        <p style="font-size: 16px; color: #555;"><strong>Email:</strong> <?= $_SESSION["user"]["email"] ?></p>
        <p style="font-size: 16px; color: #555;"><strong>Phone:</strong> <?= $_SESSION["user"]["phone"] ?></p>
        <div style="text-align: center; margin-top: 20px;">
            <a href="logout.php" style="text-decoration: none; color: #fff; background-color: #007bff; padding: 10px 20px; border-radius: 5px;">Logout</a>
        </div>
    </div>
</body>
</html>