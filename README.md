# Introduction

Ce répertoire Git contiendra les traveaux dirigés (TD) sur lesquels nous allons travailler.

# Fonctions Utiles
[functions.php](functions.php):
* `getMySQLiConnection()` - Renvoie une connexion MySQLi pour interagir avec la base de données.
* `getPDOConnection()` - Renvoie une connexion PDO, offrant une interface flexible pour accéder à une base de données.
* `isValidPassword()` - Vérifie si un mot de passe satisfait les critères de sécurité définis.
* `generateArrayOfIntegers()` - Génère un tableau d’entiers compris entre des limites données.
* `getAge()` - Calcule l’âge à partir d’une date de naissance fournie.


# List of TDs
* [TD01](TD01/README.md): verifierAge() 
    * `gettype()`: Retourne le type de la variable passée en paramètre (ex. "integer", "string").
    * `is_int()`: Vérifie si la variable est de type entier (integer).
    * `intval()`: Convertit une variable en entier.

* [TD02](TD02/README.md): generateArrayOfIntegers($min, $max, $n)
    * `rand()`: Génère un nombre aléatoire compris entre deux limites données.
    * `in_array()`: Vérifie si une valeur donnée existe dans un tableau.
    * `gettype()`: Retourne le type de la variable passée en paramètre (utile pour valider les entrées).
    * `count()`: Retourne le nombre d'éléments dans un tableau.

* [TD03](TD03/README.md): checkNumberRange($n, $min, $max)
    * `gettype()`: Retourne le type de la variable passée en paramètre (permet de vérifier si `$n` est un nombre).
    * `strlen()`: Retourne la longueur d'une chaîne (utilisé pour des validations spécifiques si nécessaire).

* [TD04](TD04/README.md): checkStringLength($str, $min, $max = -1) 
    * `strlen()`: Retourne la longueur d'une chaîne de caractères (utilisé pour vérifier si elle respecte les limites `$min` et `$max`).

* [TD05](TD05/README.md): getAge($birthdate)
    * `new DateTime()`: Permet de manipuler des dates et heures de manière flexible (ici, pour gérer la date de naissance).
    * `$a = $b->diff()`: Calcule la différence entre deux objets `DateTime` (utilisé pour déterminer l'âge).
    * `$a->format()`: Formate le résultat de la différence dans un format lisible.

* [TD07](TD07/README.md): 
    * affichier_jours_semaine()
    * `new DateTime('Monday')` : Crée une date à partir d'un nom de jour. La date générée correspondra, par exemple, au lundi suivant.
    * Création d'un tableau HTML à partir d'un tableau associatif en PHP.
    * Boucles imbriquées

* [TD08](TD08/README.md):
    * Gestion d'une Variable Globale `$GLOBALS[]`

* [TD09](TD09/README.md): 
    * Affichage de la date et le temps
    * `echo HTML` multiligne 
    * Intégration d'un code JavaScript

* [TD10](TD10/README.md):
    * Affichage d'un tableau HTML à partir d'un tableau associatif en PHP

* [TD11](TD11/README.md): 
    * Gestion des fichiers:
        * `fopen()` : Ouvre un fichier et retourne un pointeur de fichier.
        * `fwrite()` : Écrit une chaîne dans un fichier ouvert.
        * `fclose()` : Ferme un fichier ouvert et libère les ressources associées.
        * `file_exists()` : Vérifie si un fichier ou un répertoire existe.
    * Gestion des fichiers CSV:
        * `fputcsv()` : Écrit une ligne formatée en CSV dans un fichier.
        * `fgetcsv()` : Lit une ligne d'un fichier CSV et la convertit en tableau.
    * Gestion des fichiers JSON:
        * `json_encode()` : Convertit une valeur PHP en chaîne JSON.
        * `json_decode()` : Convertit une chaîne JSON en variable PHP (option associatif si spécifié).
    * Gestion des tableaux associatifs:
        * `array_combine($`keys, $row) : Crée un tableau associatif en combinant les clés et les valeurs.

* [TD12](TD12/README.md): 
    * Validation d'un email et d'un numéro de téléphone en utilisant une expression régulière

* [TD13](TD13/README.md): 
    * Sauvegarder les données soumises dans un fichier JSON
    * http_response_code() : Définit ou renvoie le code de réponse HTTP, permettant d'indiquer le statut de la requête.
    * `in_array()` : Vérifie si une valeur spécifique se trouve dans un tableau.
    * `str_len()` : Calcule la longueur d'une chaîne de caractères.
    * `str_replace()` : Recherche et remplace toutes les occurrences d'une sous-chaîne dans une chaîne.

* [TD14](TD14/README.md): 
    * Sauvegarder les données soumises dans un fichier JSON
    * Sauvegarder un fichier téléchargé avec un nom spécifique
    * `pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION)`: Extrait l'extension du nom du fichier téléchargé.
    * `is_dir()`: Vérifie si un dossier spécifié existe sur le serveur.
    * `mkdir()`: Crée un nouveau dossier sur le serveur.
    * `move_uploaded_file()`: Déplace le fichier téléchargé vers un emplacement cible.

* [TD15](TD15/README.md): 
    * ...

* [TD16](TD16/README.md): 
    * ...