# Vérification et Complétude du Système de Connexion

Dans cet exercice, vous allez construire un système de connexion basique en PHP en utilisant une base de données MySQL pour stocker les informations des utilisateurs. L’objectif est de comprendre comment gérer les sessions et sécuriser les authentifications.

## Objectif
- Créer un formulaire de connexion dans la page login.php.
- Valider les informations d’identification des utilisateurs dans la page login.php.
- Assurer la sécurité des pages privées en redirigeant les utilisateurs non authentifiés vers la page de connexion grâce au fichier security.php.
- Permettre la déconnexion des utilisateurs via la page logout.php.
- Gérer les pages privées :
    - profile.php : Affiche les informations de l’utilisateur connecté.
    - changePassword.php : Permet à l’utilisateur de modifier son mot de passe.
- Définir les pages publiques :
    - login.php
    - index.php.

## Étapes à suivre

1. Créer une base de données et une table `users`.
   Utilisez le script SQL ci-dessous pour créer la table et insérer un utilisateur exemple :
   ```sql
   CREATE TABLE users (
       id INT NOT NULL AUTO_INCREMENT,
       name VARCHAR(255) NOT NULL,
       username VARCHAR(255) NOT NULL,
       password VARCHAR(255) NOT NULL,
       email VARCHAR(255) NOT NULL,
       phone VARCHAR(255),
       token TEXT,
       UNIQUE(username),
       PRIMARY KEY(id)
   );

   INSERT INTO `users` (
    `name`, 
    `username`, 
    `password`, 
    `email`, 
    `phone`
    )
    VALUES 
   (
    'John Doe', 
    'johndoe',
    '$2y$10$CHnKBqupPvNEsWOYPecYG.9FzUL23lnrEBsTHI65u0WNb09C/2fDO',
    'johndoe@gmail.com', 
    '03456789'
    );
   ```
    Remarque : Le mot de passe de cet utilisateur est Liban@2025.

2.	Configurer la page de connexion (login.php) pour valider correctement les identifiants et rediriger les utilisateurs.
3.	Vérifier la sécurité des pages privées avec le fichier security.php, en redirigeant les utilisateurs non authentifiés vers la page de connexion.
4.	Assurer l’affichage des informations utilisateur dans profile.php.
5.	Contrôler la terminaison de session via logout.php.
6.	Valider le fonctionnement de la page de changement de mot de passe (change-password.php).
7.	Tester l’accès à la page publique index.php.

Vérifiez chaque page pour garantir que l’authentification et la gestion des sessions fonctionnent de manière cohérente et sécurisée.