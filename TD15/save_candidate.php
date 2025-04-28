<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1);

if($_SERVER["REQUEST_METHOD"] != 'POST'){
    http_response_code(405);
    die("Méthode de requête invalide.");
}

require_once('../functions.php');

if(
    isset($_POST['name'])
    && isset($_POST['email']) 
    && isset($_POST['password']) 
    && isset($_POST['birthdate']) 
    && isset($_POST['number_of_kids']) 
    && isset($_POST['gender']) 
    && isset($_POST['nationality']) 
    && isset($_POST['message']) 
    && isset($_POST['position']) 
    && isset($_FILES['cv']) 
)
{
    extract($_POST);

    // Validations
    $name = trim($name);
    if (strlen($name) < 2) {
        http_response_code(400);
        die("Le nom doit contenir au moins 2 caractères.");
    }

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        die("L'adresse email est invalide.");
    }

    if (!isValidPassword($password)) {
        http_response_code(400);
        die("Le mot de passe doit contenir au moins 8 caractères, dont une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.");
    }

    if (strtotime($birthdate) > time()) {
        http_response_code(400);
        die("La date de naissance ne peut pas être dans le futur.");
    }

    if (!in_array($gender, ['m','f'])) {
        http_response_code(400);
        die("Le genre doit être sélectionné.");
    }
    
    if (!in_array($nationality, ['fr', 'us', 'lb'])) {
        http_response_code(400);
        die("Au moins une nationalité doit être sélectionnée.");
    }

    $message = trim($message);
    if (strlen($message) < 10) {
        http_response_code(400);
        die("Le message doit contenir au moins 10 caractères.");
    }

    if (!is_numeric($number_of_kids) || $number_of_kids < 0) {
        http_response_code(400);
        die("Le nombre d'enfants doit être un nombre positif.");
    }

    if (in_array($position, ['manager', 'supervisor', 'employee']) == false) {
        http_response_code(400);
        die("Le poste est obligatoire.");
    }
    
    if($_FILES["cv"]["error"] !== 0) die("Une erreur s'est produite lors du téléchargement de votre CV");
    if($_FILES["cv"]["type"] != 'application/pdf') die("Le CV téléchargé n'est pas un document PDF.");
    if($_FILES["cv"]["size"] > (5 * 1024 * 1024)) die("Cette taille du CV téléchargé est supérieure à 5M.");

    // The CV should be saved in uploads/cv/{year}/{month}
    $dir = 'uploads/cv/' . date('Y') . '/' . date('m');
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    $id = uniqid();
    $filename = $id . '.' . pathinfo($_FILES["cv"]["name"], PATHINFO_EXTENSION);
    $filepath = $dir . '/' . $filename;

    if (!move_uploaded_file($_FILES["cv"]["tmp_name"], $filepath)) {
        http_response_code(500);
        die("Une erreur s'est produite lors du téléchargement de votre CV.");
    }    

    // Save to database
    $password = password_hash($password, PASSWORD_BCRYPT);
    $conn = getPDOConnection();
    $query = "
        INSERT INTO candidate (
            id,
            name, 
            email, 
            password, 
            birthdate, 
            number_of_kids, 
            gender, 
            nationality, 
            message, 
            position, 
            cv
        ) VALUES (
            :id,
            :name, 
            :email, 
            :password, 
            :birthdate, 
            :number_of_kids, 
            :gender, 
            :nationality, 
            :message, 
            :position, 
            :cv         
        )
    ";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);
    $stmt->bindParam(':number_of_kids', $number_of_kids, PDO::PARAM_INT);
    $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
    $stmt->bindParam(':nationality', $nationality, PDO::PARAM_STR);
    $stmt->bindParam(':message', $message, PDO::PARAM_STR);
    $stmt->bindParam(':position', $position, PDO::PARAM_STR);
    $stmt->bindParam(':cv', $filepath, PDO::PARAM_STR);

    $stmt->execute();
    $stmt = null;
    $conn = null;

    header('location: candidates.php');
    exit();
}
?>