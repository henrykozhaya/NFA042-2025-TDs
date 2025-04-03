<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1);
if($_SERVER["REQUEST_METHOD"] != 'POST'){
    http_response_code(405);
    die("Méthode de requête invalide.");
}

// Fonction pour valider le mot de passe
function validatePassword($password) {
    return preg_match('/[A-Z]/', $password) && // Au moins une lettre majuscule
           preg_match('/[a-z]/', $password) && // Au moins une lettre minuscule
           preg_match('/[0-9]/', $password) && // Au moins un chiffre
           preg_match('/[\W_]/', $password) && // Au moins un caractère spécial
           strlen($password) >= 8;            // Minimum 8 caractères
}

function validateEmail($email)
{
    $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    return preg_match($pattern, $email);
}

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
    && isset($_POST['skills']) 
    && isset($_FILES['cv']) 
)
{
    extract($_POST);

    // Validations
    if (strlen($name) < 2) {
        http_response_code(400);
        die("Le nom doit contenir au moins 2 caractères.");
    }

    if (!validateEmail($email)) {
        http_response_code(400);
        die("L'adresse email est invalide.");
    }

    if (!validatePassword($password)) {
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
    
    if (count($nationality) == 0) {
        http_response_code(400);
        die("Au moins une nationalité doit être sélectionnée.");
    }

    if (strlen($message) < 10) {
        http_response_code(400);
        die("Le message doit contenir au moins 10 caractères.");
    }

    if (count($position) == 0) {
        http_response_code(400);
        die("Le poste est obligatoire.");
    }

    if (count($skills) == 0) {
        http_response_code(400);
        die("Au moins une compétence doit être sélectionnée.");
    }
    
    if($_FILES["cv"]["error"] !== 0) die("Une erreur s'est produite lors du téléchargement de votre CV");
    if($_FILES["cv"]["type"] != 'application/pdf') die("Le CV téléchargé n'est pas un document PDF.");
    if($_FILES["cv"]["size"] > (5 * 1024 * 1024)) die("Cette taille du CV téléchargé est supérieure à 5M.");

    $dirName = date('Y-m-d');
    $dirName .= '-';
    $dirName .= str_replace(' ', '-', strtolower($name));
    $dirName .= '-';
    $dirName .= implode('-', $position); // le type de $position est array
    
    if(!is_dir($dirName)){
        mkdir($dirName);
    }
    $cvExtension = pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION);
    $cvFilename = $dirName . "." . $cvExtension;
    
    move_uploaded_file($_FILES["cv"]["tmp_name"], $dirName . '/' . $cvFilename);

    // Préparation des données à sauvegarder
    $data = [
        'name' => $name,
        'email' => $email,
        'birthdate' => $birthdate,
        'number_of_kids' => (int)$number_of_kids,
        'gender' => $gender,
        'nationality' => $nationality,
        'message' => $message,
        'position' => $position,
        'skills' => $skills,
        'submission_date' => date('Y-m-d H:i:s'),
    ];

    // Construction du nom de fichier
    $dataFilename = $dirName . ".json";

    // Sauvegarde dans un fichier JSON
    file_put_contents($dirName . '/' . $dataFilename, json_encode($data, JSON_PRETTY_PRINT)) or die("Erreur de création du fichier JSON");

    echo("Les données ont été sauvegardées!");

}
else{
    http_response_code(400);
    die("Les données ne sont pas soumises entièrement");
}