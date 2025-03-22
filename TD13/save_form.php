<?php
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
    $filename = date('Y-m-d');
    $filename .= '-';
    $filename .= str_replace(' ', '_', strtolower($name));
    $filename .= '-';
    $filename .= implode('-', $position); // le type de $position est array
    $filename .= '.json';

    // Sauvegarde dans un fichier JSON
    file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT)) or die("Erreur de création du fichier JSON");

    echo("Les données ont été sauvegardées dans le fichier $filename.");

}
else{
    http_response_code(400);
    die("Les données ne sont pas soumises entièrement");
}