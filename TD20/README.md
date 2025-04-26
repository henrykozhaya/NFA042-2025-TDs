# Utilisation d'une classe en PHP

Ce projet met en œuvre une classe PHP nommée `Person`, avec des propriétés, un constructeur et diverses fonctions pour gérer les informations personnelles d'un individu. Le but est de renforcer la compréhension des concepts fondamentaux de la programmation orientée objet (POO).

## Objectifs
- Apprendre à définir une classe avec des propriétés privées.
- Implémenter des constructeurs pour initialiser les propriétés.
- Utiliser des getters et setters pour contrôler l'accès et la validation des propriétés.
- Ajouter des méthodes pour exécuter des actions spécifiques liées à la classe.

## Fichier clé

### `Person.php`
Ce fichier contient la classe `Person`, qui inclut les fonctionnalités suivantes :

#### Propriétés
- `name` (string) : Nom de la personne.
- `email` (string) : Adresse email de la personne.
- `gender` (string) : Genre de la personne ("Female" ou "Male").
- `birthdate` (string) : Date de naissance au format `Y-m-d`.

#### Constructeur
- `__construct($name, $email)` : Initialise les propriétés `name` et `email`.

#### Getters
- `getName()` : Retourne le nom de la personne.
- `getEmail()` : Retourne l'email de la personne.
- `getGender()` : Retourne le genre de la personne.
- `getBirthdate()` : Retourne la date de naissance de la personne.

#### Setters
- `setName($name)` : Définit le nom de la personne.
- `setEmail($email)` : Valide et définit l'email.
- `setGender($gender)` : Valide et définit le genre.
- `setBirthdate($birthdate)` : Valide la date de naissance et vérifie si l'âge est supérieur à 18 ans.

#### Méthodes diverses
- `getWelcomeMessage()` : Retourne un message de bienvenue personnalisé basé sur le genre.
- `getAge()` : Calcule et retourne l'âge de la personne en années.

## Instructions

### Exemple d'utilisation
```php
require_once 'Person.php';

// Création d'une nouvelle instance de la classe Person
$person = new Person("Alice", "alice@example.com");

// Définition des propriétés
$person->setGender("Female");
$person->setBirthdate("1990-05-15");

// Affichage des informations
echo $person->getWelcomeMessage(); // Output : Welcome Ms. Alice
echo "\nAge: " . $person->getAge(); // Output : Age: 34 (en 2024)
```

### Vérification des données
- **Email** : Nettoyé avec `FILTER_SANITIZE_EMAIL` et validé avec `FILTER_VALIDATE_EMAIL`.
- **Genre** : Doit être soit "Female", soit "Male".
- **Date de naissance** : Doit être au format `Y-m-d` et correspondre à un âge supérieur à 18 ans.

### Bonnes pratiques
- Utiliser des exceptions pour gérer les erreurs lors de la définition de la date de naissance.
- Toujours protéger les propriétés de la classe en les définissant comme privées.