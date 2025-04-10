<?php 
require_once '../functions.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if
    (
        isset($_POST['name']) 
        && isset($_POST['email']) 
        && isset($_POST['birthdate'])
        && !empty($_POST['name'])
        && !empty($_POST['email'])
        && !empty($_POST['birthdate'])
    )
    {
        extract($_POST);
        $name = htmlspecialchars($name);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            die("Invalid email format");
        }
        if(strtotime($birthdate) === false) {
            http_response_code(400);
            die("Invalid date format");
        }

        if(strtotime($birthdate) > time()) {
            http_response_code(400);
            die("Date of birth cannot be in the future");
        }

        $conn = getPDOConnection();
        $query = "INSERT INTO `student` (`name`, `email`, `birthdate`) VALUES (:name, :email, :birthdate)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);
        if($stmt->execute()){
            $stmt = null;
            $conn = null;
            header("location: index.php");
            exit();
        } else {
            http_response_code(500);
            die("Failed to add student");
        }
    }
}
else{
    http_response_code(405);
    die("Method Not Allowed");
}

