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
    * Application à un poste de travail (Formulaire + Gestion de fichiers)
    * Sauvegarde d'un fichier dans un répertoire spécifique avec un nom de fichier aléatoire.
    * `password_hash()`: Cette fonction génère un hachage sécurisé à partir d'un mot de passe, assurant la protection des données sensibles.
    * `uniqid()`: Elle produit un identifiant unique basé sur l'heure actuelle, utile pour nommer des fichiers de manière unique.
    * `http_response_code()`: Permet de définir ou de récupérer le code de réponse HTTP, indiquant le statut de la requête.

* [TD16](TD16/README.md): 
    * Créer un étudiant dans la base de données : Insère un nouvel étudiant dans la base en créant un objet représentant un étudiant.
    * Afficher la liste des étudiants : Récupère et affiche dans un tableau l'ensemble des étudiants stockés dans la base.
    * `htmlspecialchars()` : Convertit les caractères spéciaux en entités HTML pour sécuriser l'affichage.
    * `filter_var($value, FILTER_SANITIZE_EMAIL)` : Nettoie une adresse email en supprimant les caractères indésirables.
    * `filter_var($value, FILTER_VALIDATE_EMAIL)` : Valide qu'une adresse email respecte le format standard.

* [TD17](TD17/README.md): 
    * En complément du TD16, TD17 introduit des opérations de mise à jour et de suppression dans la base de données :
        * Mise à jour d’un objet : permet de modifier les informations d’un étudiant existant dans la base.
        * Suppression d’un objet : permet de retirer un étudiant de la base de données.

    * Fonctions PDO :
        * `$stmt->fetch(PDO::FETCH_ASSOC)` : Récupère la prochaine ligne du résultat sous forme d’un tableau associatif.
        * `$stmt->fetchAll(PDO::FETCH_ASSOC)` : Récupère toutes les lignes du résultat sous forme de tableaux associatifs.

* [TD18](TD18/README.md): Un système de login/logout basique ave PHP
    * `password_verify()`: Vérifie qu'un mot de passe en clair correspond à un hachage sécurisé. Cette fonction est essentielle pour comparer le mot de passe saisi par l'utilisateur avec celui stocké dans la base de données.
    * `password_hash()`: génère une version hachée d'un mot de passe en utilisant un algorithme cryptographique sécurisé (comme BCRYPT ou ARGON2).
    * `$_SERVER["PHP_SELF"]`: Contient le chemin d'accès au script actuellement exécuté. On l'utilise souvent pour faire référence au même script dans un formulaire, favorisant des soumissions sécurisées et dynamiques.
    * `session_start()`: Initialise une nouvelle session ou reprend une session existante. C'est impératif pour accéder aux variables de session tout au long de la navigation de l'utilisateur.
    * `session_destroy()`: Termine la session en cours et supprime toutes les données associées. Elle sert souvent à déconnecter un utilisateur, assurant ainsi que ses informations de session ne persistent pas.
    * `$_SESSION[]`: Tableau associatif superglobal permettant de stocker et de récupérer des informations durant une session. Il sert à conserver des données utilisateur entre différentes pages du site.

* [TD19](TD19/README.md): Login + Remember Me
    * setcookie(): Crée un cookie côté client en définissant un nom, une valeur et une date d'expiration. Utile pour mémoriser des informations entre les visites.
    * $_COOKIE[]: Tableau superglobal qui contient les cookies envoyés par le navigateur. Il permet de récupérer les valeurs stockées pour les utiliser dans l'application.
    * Delete a cookie: Supprime un cookie en utilisant setcookie() avec une date d'expiration passée, ce qui incite le navigateur à le retirer.
    * Auto-Login: Mécanisme qui vérifie l'existence d'un cookie d'authentification pour reconnecter automatiquement un utilisateur sans saisie répétée de ses identifiants.

* [TD20](TD20/README.md): Classe Person

    * La classe Person représente une personne et gère ses informations essentielles via des propriétés privées.
    * Le constructeur initialise les données de base, tandis que les méthodes getters et setters permettent d'accéder et de modifier ces attributs en respectant le principe d'encapsulation.
    * Private properties : Contient les informations internes de la classe (par exemple, nom, prénom, âge, etc.).
    * __construct() : Initialise une nouvelle instance de la classe Person avec les paramètres essentiels.
    * Getters : Fournissent un accès en lecture aux propriétés privées, permettant d'obtenir des informations telles que le nom, l'âge, etc.
    Setters : Permettent la modification sécurisée des propriétés privées.
    * getAge() : Retourne l'âge de la personne en renvoyant la valeur stockée ou en la calculant si nécessaire.