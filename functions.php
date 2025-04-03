<?php
define('MYSQL_SERVERNAME', '127.0.0.1');
define('MYSQL_USERNAME', 'nfa008');
define('MYSQL_PASSWORD', 'JxJOA!L!_rVrL9Lf');
define('MYSQL_DBNAME', 'nfa008');


/**
 * Retourne une connexion MySQLi à la base de données.
 *
 * Cette fonction crée et retourne une instance de mysqli en utilisant les constantes
 * MYSQL_SERVERNAME, MYSQL_USERNAME, MYSQL_PASSWORD et MYSQL_DBNAME. En cas d'erreur
 * lors de la connexion, le script s'arrête et affiche un message d'erreur.
 *
 * @return mysqli La connexion MySQLi établie.
 */
function getMySQLiConnection(){
    $conn = new mysqli(MYSQL_SERVERNAME, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DBNAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

/**
 * Retourne une connexion PDO à la base de données.
 *
 * Cette fonction tente de créer et de retourner une instance PDO en utilisant les constantes
 * MYSQL_SERVERNAME, MYSQL_USERNAME, MYSQL_PASSWORD et MYSQL_DBNAME. Si la connexion échoue,
 * un message d'erreur est affiché et la fonction retourne null.
 *
 * @return PDO|null La connexion PDO établie ou null en cas d'erreur.
 */
function getPDOConnection(){
    try {
        $conn = new PDO("mysql:host=".MYSQL_SERVERNAME.";dbname=".MYSQL_DBNAME, MYSQL_USERNAME, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}

/**
 * Vérifie la validité d'un mot de passe.
 *
 * Cette fonction teste si le mot de passe fourni est suffisamment fort. Un mot de passe valide doit :
 * - contenir au moins 8 caractères,
 * - contenir au moins une lettre majuscule,
 * - contenir au moins une lettre minuscule,
 * - contenir au moins un chiffre,
 * - contenir au moins un caractère spécial.
 *
 * @param string $password Le mot de passe à valider.
 * @return bool Retourne true si le mot de passe est valide, false sinon.
 */
function isValidPassword($password) {
    $passLength = strlen($password) >= 8;
    $uppercase    = preg_match('@[A-Z]@', $password);
    $lowercase    = preg_match('@[a-z]@', $password);
    $number       = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    return $passLength && $uppercase && $lowercase && $number && $specialChars;
}

/**
 * Génère un tableau d'entiers uniques triés.
 *
 * Cette fonction génère un tableau contenant $n entiers uniques tirés au hasard entre $min et $max.
 * Les trois paramètres doivent être des entiers. Le tableau retourné est trié en ordre croissant.
 *
 * @param int $min La valeur minimale possible.
 * @param int $max La valeur maximale possible.
 * @param int $n Le nombre d'entiers à générer.
 * @return int[] Un tableau trié d'entiers uniques.
 */
function generateArrayOfIntegers($min, $max, $n)
{
    $result = [];
    if (gettype($min) == 'integer' && gettype($max) == 'integer' && gettype($n) == 'integer') {
        while (count($result) < $n) {
            $randomNumber = rand($min, $max);
            if (!in_array($randomNumber, $result)) {
                array_push($result, $randomNumber);
            }
        }
        sort($result);
    }
    return $result;
}

/**
 * Calcule l'âge à partir d'une date de naissance.
 *
 * Cette fonction calcule l'âge d'une personne en fonction de sa date de naissance passée en paramètre.
 * La date doit être fournie dans un format compatible avec la classe DateTime. La fonction retourne
 * l'âge calculé sous forme d'entier.
 *
 * @param string $birthdate La date de naissance (par exemple, "YYYY-MM-DD").
 * @return int L'âge calculé.
 */
function getAge($birthdate)
{
    $age = null;
    $today = new DateTime();
    $birthdate = new DateTime($birthdate);
    $age = $today->diff($birthdate);
    return (int)$age->format('%y');
}