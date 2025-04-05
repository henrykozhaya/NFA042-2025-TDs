<?php 
require_once '../functions.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if
    (
        isset($_POST['nom']) 
        && isset($_POST['email']) 
        && isset($_POST['date_de_naissance'])
        && !empty($_POST['nom'])
        && !empty($_POST['email'])
        && !empty($_POST['date_de_naissance'])
    )
    {
        extract($_POST);
        $nom = htmlspecialchars($nom);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            die("Invalid email format");
        }
        if(strtotime($date_de_naissance) === false) {
            http_response_code(400);
            die("Invalid date format");
        }

        if(strtotime($date_de_naissance) > time()) {
            http_response_code(400);
            die("Date of birth cannot be in the future");
        }

        $conn = getPDOConnection();
        $query = "INSERT INTO student (nom, email, date_de_naissance) VALUES (:nom, :email, :date_de_naissance)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':date_de_naissance', $date_de_naissance, PDO::PARAM_STR);
        if($stmt->execute()){
            $stmt = null;
            $conn = null;
            header("Location: index.php");
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

